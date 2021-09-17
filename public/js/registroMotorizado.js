var base_url = window.location.origin;
//hiden
//$("#subestado").hide();
$("#Divsubsubestado").hide();
$("#Divprovincia").hide();
$("#Divpdistribucion").hide();
$("#Divagendamiento").hide();
$("#Divagendamiento2").hide();
$("#Divinventario").hide();
//

      $( "#API" ).click(function() {
        });
       $("#idCliente").change(function(){
           recargarPrestamo();
       });
       /*$("#subestado").change(function(){
         alert('Prestamo');
      });*/
       
  
      $("#estado").change(function () {
        if($("#estado").val() == ""){
            emptySelect('subestado');
        }else {
            $id = this.value;
            $.get(base_url+"/subestado/", {id: $id}, function (data) {
               // fillSelect('subestado', data);
             //console.log(data)
             emptySelect('subestado');
             var $select = $('#subestado');
                $.each(data, function(id, name) {
                  $select.append('<option value=' + name.id + '>' + name.nombre + '</option>');
                });
            });
        }
      });
      $("#subestado").change(function () {
        sub=$("#subestado").val();
        //estados inhabilitados
        provincia = ['9','10','11','12','23'];
        inventario = ['2','3','9','10','12','13','14','15','16','23','27','28','33'];
        //estados habilitados
        agendamiento = ['2','3','6','7','11','25','26'];
        //estados punto distribucion
        if(sub!=12){
          $("#Divpdistribucion").show();
        }else{
          $("#Divpdistribucion").hide();
          $("#pdistribucion").val('');
        }
        //estados punto distribucion inhabilitado
       
        if((provincia.includes(sub))==true){
          $("#Divprovincia").hide();
          $("#provincia").val('');
        }else{
          $("#Divprovincia").show();
        }
        //estados agendamientos habilitado        
        if((agendamiento.includes(sub))==true){
          $("#Divagendamiento").show();
          $("#Divagendamiento2").show();
         
        }else{
          $("#Divagendamiento").hide();          
          $("#Divagendamiento2").hide();
          $("#fechaAgendamiento").val('');
          $("#horaAgendamiento").val('');
        }
        //inventario
        if((inventario.includes(sub))==false){
          $("#Divinventario").show();
        }else{
          $("#Divinventario").hide(); 
          $("#inventario").val('');         
        }

        if($("#subestado").val() == ""){
            emptySelect('subsubestado');
        }else {
            $id = this.value;
            //$.get("{{ route('getSubsubestado') }}", {id: $id}, function (data) {
            $.get(base_url+"/subsubestado/", {id: $id}, function (data) {
              
            // console.log(data)
            
             if(data.length==0){
              $("#Divsubsubestado").hide();
             }else{
              $("#Divsubsubestado").show();
              var $select = $('#subsubestado');
              emptySelect('subsubestado');
                $.each(data, function(id, name) {
                  $select.append('<option value=' + name.id + '>' + name.nombre + '</option>');
                });
             }
             
            });
        }
      });
 
  function emptySelect(idSelect) {
      var select = document.getElementById(idSelect);
      var option = document.createElement('option');
      var NumberItems = select.length;
  
      while (NumberItems > 0) {
          NumberItems--;
          select.remove(NumberItems);
      }  
      option.text = 'SELECCIONE';
      option.value = ''
      select.add(option, null);
  }
  
 
      