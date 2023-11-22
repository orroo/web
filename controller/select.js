function VERIFplan ()
{

    if ((!document.getElementById('med').checked)&&(!document.getElementById('test').checked)&&(!document.getElementById('psy').checked)&&(!document.getElementById('ther').checked))
    {
        console.log("errrreur");
        alert("on ne peut pas choisir un plan sans choix")
        return false;

    }
    else
    {
        return true;
    }
    


};