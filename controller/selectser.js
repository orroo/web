



function verifname()
{
    if ((document.getElementById("name").value==null)||(document.getElementById("name").value==""))
    {
        console.log("error name");
        document.getElementById("name").style.border="2px solid red";
        return false;
    }
    else 
    {
        console.log("pass name");
        document.getElementById("name").style.border="2px solid green";
        return true;
    }
}


function verifprice()
{
    if ((document.getElementById("price").value==null)||(document.getElementById("price").value<0)||(document.getElementById("price").value==""))
    {
        console.log("error price");
        document.getElementById("price").style.border="2px red solid";
        return false;
    }
    else 
    {
        console.log("pass price");
        document.getElementById("price").style.border="2px green solid";
        return true;
    }
}


function verifdesc()
{
    if (document.getElementById("desc").value=="")
    {
        console.log("error desc");
        document.getElementById("desc").style.border="2px red solid";
        return false;
    }
    else 
    {
        console.log("pass desc");
        document.getElementById("desc").style.border="2px green solid";
        return true;
    }
}


function VERIFSER()
{
    var n=verifname();
    var p=verifprice();
    var d=verifdesc();
    if ((d)&&(p)&&(n))
    {
        return true;
    }
    else
    {
        return false;
    }
}




