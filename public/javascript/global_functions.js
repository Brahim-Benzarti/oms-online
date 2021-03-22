previous_id="";
function talking_with(id){
    if(previous_id!=""){
        document.getElementById(previous_id).style.background= "black";
    }
    document.getElementById(id).style.background= "#b3b3b3";
    previous_id=id; 
};
