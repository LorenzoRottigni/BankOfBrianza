function cfCheck(cf){
    document.getElementById('cfCheck').innerHTML = cf;
    //alert(cf);
    if(codiceFISCALE(cf)){
        document.getElementById('cfCheck').innerHTML = "VALIDATED"
    }
    else {
        document.getElementById('cfCheck').innerHTML = "ERROR"
    }
} 
function codiceFISCALE(cfins)
{
            var cf = cfins.toUpperCase();
            var cfReg = /^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/;
            if (!cfReg.test(cf))
            {
                return false;
            }
            
            var set1 = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            var set2 = "ABCDEFGHIJABCDEFGHIJKLMNOPQRSTUVWXYZ";
            var setpari = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            var setdisp = "BAKPLCQDREVOSFTGUHMINJWZYX";
            var s = 0;
            for( i = 1; i <= 13; i += 2 )
            s += setpari.indexOf( set2.charAt( set1.indexOf( cf.charAt(i) )));
            for( i = 0; i <= 14; i += 2 )
            s += setdisp.indexOf( set2.charAt( set1.indexOf( cf.charAt(i) )));
            if ( s%26 != cf.charCodeAt(15)-'A'.charCodeAt(0) )
                return false;
            return true;
}
function checkNum(idCaller, toSet)
        {
        if ((event.keyCode > 47 && event.keyCode < 58)){
            document.getElementById(toSet).innerHTML = "<div onmouseover=\"disappear(this.id)\" class=\"checkDiv\" id=\"checkOut\">NO NUMBERS ALLOWED</div>"
            document.getElementById(idCaller).value = " ";
            return false;
        }else{
            return true;
        }
} 