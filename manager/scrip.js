function fetchemp1()
{
    var cate=document.getElementById("cat").value;
    $.ajax({
        url:"f.php",
        method:"POST",
        data: {
            c : cate
        },
        dataType:"JSON",
        success:function(data){
            document.getElementById("lname").value=data.lname;
            document.getElementById("p2").value=data.p2;
            document.getElementById("p4").value=data.p4;
            document.getElementById("p5").value=data.p5;

        }


    })

}