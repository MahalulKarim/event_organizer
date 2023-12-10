      </div>
      </div>    
    </div>  
  </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- datatble -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
      $(document).ready(function () {
          $('#example').DataTable();
      });
    </script>
    <script>  
      $(document).ready(function(){  
          var i=1;  
          $('#add').click(function(){  
                i++;  
                $('#dynamic_field').append('<tr id="row'+i+'"><td  class="border-0" width="90%"><input type="text" name="deskripsi[]" class="form-control text-center" required placeholder="Input Deskripsi"/></td><td class="border-0"><button type="button" name="remove" id="'+i+'" class="btn text-danger btn_remove"><i class="fa-solid fa-circle-minus fa-xl"></i></button></td></tr>');  
          });  
          $(document).on('click', '.btn_remove', function(){  
                var button_id = $(this).attr("id");   
                $('#row'+button_id+'').remove();  
          });  
         
      });  
    </script>
    <script>
      // Get the container element
        var btnContainer = document.getElementById("menu");

        // Get all buttons with class="btn" inside the container
        var btns = btnContainer.getElementsByClassName("my-nav-link");

        // Loop through the buttons and add the active class to the current/clicked button
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("my-nav-link-active");
            current[0].className = current[0].className.replace(" my-nav-link-active", "");
            this.className += " my-nav-link-active";
          });
        }

   
    </script>
    <script>
      $( "#t_bayar" ).on( "keyup", function() {
        let totalBayar=$("#t_bayar").val();
        let totalDp=(50/100)*totalBayar;
        let formatter = new Intl.NumberFormat("id-ID", {style: "currency",currency: "IDR",});
        let hasilFormat = formatter.format(totalDp);
        $("#dp").html(hasilFormat);
      });
    </script>
    <script>  
      $(document).ready(function(){  
          var i=1;  
          $('.add').click(function(){  
                i++;  
                $('.dynamic_field').append('<tr id="row'+i+'"><td  class="border-0 f-1" width="90%"><input type="text" name="deskripsi[]" class="form-control form-control-sm text-center" required placeholder="Input Request"/></td><td class="border-0"><button type="button" name="remove" id="'+i+'" class="btn text-danger btn_remove ms-4"><i class="fa-solid fa-circle-minus fa-xl"></i></button></td></tr>');  
          });  
          $(document).on('click', '.btn_remove', function(){  
                var button_id = $(this).attr("id");   
                $('#row'+button_id+'').remove();  
          });  
         
      });  
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>