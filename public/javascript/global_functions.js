previous_id="";
function talking_with(id){
    if(previous_id!=""){
        document.getElementById(previous_id).style.background= "black";
    }
    document.getElementById(id).style.background= "#b3b3b3";
    previous_id=id; 
};

function correct_image(){
    status=document.getElementById('status').innerHTML;
    if(status=='Friends'){
        document.getElementById('with_image').style.backgroundImage = "url('../public/images/friends.png')";
    }else if(status=='Friend request sent'){
        document.getElementById('with_image').style.backgroundImage = "url('../public/images/mad.png')";
    }else if(status=='Pending friendship'){
        document.getElementById('with_image').style.backgroundImage = "url('../public/images/add.png')";
    };
    // else{
    //     document.getElementById('with_image').style.backgroundImage = "url('../public/images/requested.png')";
    // }
    document.getElementById('with_image').style.backgroundSize = "24%";
}
