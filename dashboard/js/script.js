function delete_post(id){
  let permission=confirm("Are you Sure to Delete Post?");
  if(permission){
    fetch(`delete.php?id=${id}`).then(
      r=>{
        if(r.ok){
          return r.text();
        }
      }
    ).then(
      d=>{
        if(d=="1"){
          location.reload();
        }else{
          console.log("post not deleted!!!")
        }
      }
    )
  }
}


function search(s){
  fetch(`search.php?s=${s}`).then(
    r=>{
      if(r.ok){
        return r.text();
      }
    }
  ).then(
    d=>{
      postsID.innerHTML=d;
    }
  )
}