//--------- Calcul total parice facture ----------//
        $('input[name^=price]').keyup(function(){
            var quantity = $(this).parent().prev().children("input").val(),
                price = $(this).val(),
                child_total = (quantity * price)/2,
                princip_total = (child_total += child_total);
                $(this).parent().next().children("b").children("span").text(price * quantity);
        });
        $('input[name^=quantity]').keyup(function(){
            var quantity = $(this).parent().next().children("input").val(),
                price = $(this).val(),
                child_total = (quantity * price)/2,
                princip_total = (child_total += child_total);
                //$('#princip_total').text(princip_total);
                $(this).parent().next().next().children("b").children("span").text(price * quantity);
        });
//-------- script searsh btn ---------------//
function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }