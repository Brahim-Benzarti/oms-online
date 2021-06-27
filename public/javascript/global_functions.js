previous_id="";
function talking_with(id){
    if(previous_id!=""){
        document.getElementById(previous_id).classList.remove("currently_talking");
    }
    document.getElementById(id).classList.add("currently_talking");
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


function change_picture(){
    var back_ind=Math.floor(Math.random() * 10)+1;
    var ind=back_ind.toString()
    document.getElementById('iframe_box').style.backgroundImage="url('../public/images/"+ind+".jpg')";
}

messaging_features=(show)=>{
    // var docc=document.getElementById('text_features').style.display;
    if(show){
        document.getElementById('text_features').style.display= "flex";
    }
    else{
        document.getElementById('text_features').style.display= "none";
    }
}

ref_to_sen=()=>{
    if(document.getElementById('message').value!=''){
        document.getElementById('submit').value="Send";
    }else{
        document.getElementById('submit').value="Refresh";
    }
}

filter=()=>{
    key=document.getElementsByClassName("search")[0].value.toUpperCase();
    for(i=0;i<document.getElementsByClassName("filter").length;i++){
        if(document.getElementsByClassName("filter")[i].innerHTML.toUpperCase().search(key)==-1){
            document.getElementsByClassName("filtering")[i].classList.add("hidden");
        }else{
            document.getElementsByClassName("filtering")[i].classList.remove("hidden");
        }
    }
}

new_message=()=>{
    for(i=0;i<document.getElementsByClassName("initial").length;i++){
        document.getElementsByClassName("initial")[i].classList.add("hidden");
    }
    document.getElementsByClassName("new_message")[0].classList.remove("hidden");
    document.getElementsByClassName("back_to_inbox")[0].classList.remove("hidden");
}

