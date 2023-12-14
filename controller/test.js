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
function changeColor(elementId,error) {
    if(error==1)
    {
        document.getElementById(elementId).style.border = '2px solid red';
    }
    else
    {
        document.getElementById(elementId).style.border = ''
    }
    
}

function verif()
{
    document.getElementById("nameError").textContent = "";
    document.getElementById("emailError").textContent = "";
    document.getElementById("addressError").textContent = "";
    document.getElementById("cityError").textContent = "";
    document.getElementById("stateError").textContent = "";
    document.getElementById("zipError").textContent = "";
    document.getElementById("namecError").textContent = "";
    document.getElementById("cardError").textContent = "";
    document.getElementById("expError").textContent = "";
    document.getElementById("cwError").textContent = "";


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
        changeColor("name",1);
        document.getElementById("nameError").textContent = "Name is required without numbers.";
        return false;
    }
    else
    {
        changeColor("name",0);
    }
    if (validateEmail(email)==false) 
    {
        changeColor("email",1);
        document.getElementById("emailError").textContent = "email format";
        return false;
    }
    else
    {
        changeColor("email",0);
    }
    if (validatename(city)==false) 
    {
        changeColor("city",1);
        document.getElementById("cityError").textContent = "no numbers";
        return false;
    }
    else
    {
        changeColor("city",0);
    }
    if (validatename(state)==false) 
    {
        changeColor("state",1);
        document.getElementById("stateError").textContent = "no numbers";
        return false;
    }
    else
    {
        changeColor("state",0);
    }
    if (validatezip(zip)==false)
    {
        changeColor("zip",1);
        document.getElementById("zipError").textContent = "less than 7 numbers";
        return false;
    }
    else
    {
        changeColor("zip",0); 
    }
    if (validatename(namec)==false) 
    {
        changeColor("namec",1);
        document.getElementById("namecError").textContent = "Name is required without numbers";
        return false;
    }
    else
    {
        changeColor("namec",0);
    }
    if (validatecard(card)==false)
    {
        changeColor("card",1);
        document.getElementById("cardError").textContent = "card error";
        return false;
    }
    else
    {
        changeColor("card",0);
    }
    if (validatexp(xp)==false)
    {
        changeColor("xp",1);
        document.getElementById("expError").textContent = "date error";
        return false;
    }
    else
    {
        changeColor("xp",0);
    }
    if(validatecw(cw)==false)
    {
        changeColor("cw",1);
        document.getElementById("cwError").textContent = "cw error";
        return false;
    }
    else
    {
        changeColor("cw",0);
    }


}