function fetchemp()
{
    var cate=document.getElementById("cat").value;
    $.ajax({
        url:"fetch.php",
        method:"POST",
        data: {
            c : cate
        },
        dataType:"JSON",
        success:function(data){
            document.getElementById("zones").value=data.zones;

        }


    })

}