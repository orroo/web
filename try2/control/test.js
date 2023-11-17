function validateEmail(email)
{
    var emailRegex = /^[^\s@]+@[^\s@]+.[^\s@]+$/;
    return emailRegex.test(email);
}
function validatename(ch)
{
    if (ch=="")
			return false;
		
		for(var i=0;i<ch.length;i++)
		{
			var c = ch.charAt(i).toUpperCase();
			if ( (c<'A')||(c>'Z'))
				return false;
		}
		
}
function validatezip(ch)
{
    if (ch=="")
			return false;
    if (ch.length>7)
            return false;
	for(var i=0;i<ch.length;i++)
	    {
			var c = ch.charAt(i).toUpperCase();
			if ( (c<'1')||(c>'9'))
				return false;
		}
		
}
function validatecard(ch)
{
    if (ch=="")
			return false;
    if (ch.length != 17)
            return false;
	for(var i=0;i<ch.length;i++)
	    {
			var c = ch.charAt(i).toUpperCase();
			if ( (c<'1')||(c>'9'))
				return false;
		}
		
}
function validatexp(d)
{ 
    let dat = new Date(d);
    let dateM=new Date("2023/12/31");

    let datemin=new Date("2030/12/31");

    console.log(dat+ "/" + dateM);
    if ((dat>=dateM)&&(dat<=datemin))
    {

        console.log("?");
        return true;

    }
    else 
    {
        return false;
    }
}

function validatecw(ch)
{
    if (ch=="")
			return false;
    if (ch.length != 4)
            return false;
	for(var i=0;i<ch.length;i++)
	    {
			var c = ch.charAt(i).toUpperCase();
			if ( (c<'1')||(c>'9'))
				return false;
		}

}
function changeColor(elementId) {
    document.getElementById(elementId).style.border = '2px solid red';
}

function verif()
{
    fname=document.getElementById("name").value;
    email=document.getElementById("email").value;
    city=document.getElementById("city").value;
    state=document.getElementById("state").value;
    zip=document.getElementById("zip").value;
    card=document.getElementById("card").value;
    namec=document.getElementById("namec").value;
    xp=document.getElementById("xp").value;
    cw=document.getElementById("cw").value;
    if(validatename(fname)==false)
    {
        changeColor("name");
        return false;
    }
    if (validateEmail(email)==false) 
    {
        changeColor("email");
        return false;
    }
    if (validatename(city)==false) 
    {
        changeColor("city");
        return false;
    }
    if (validatename(state)==false) 
    {
        changeColor("state");
        return false;
    }
    if (validatezip(zip)==false)
    {
        changeColor("zip");
        return false;
    }
    if (validatename(namec)==false) 
    {
        changeColor("namec");
        return false;
    }
    if (validatecard(card)==false)
    {
        changeColor("card");
        return false;
    }
    if (validatexp(xp)==false)
    {
        changeColor("xp");
        return false;
    }
    if(validatecw(cw)==false)
    {
        changeColor("cw");
        return false;
    }


}