$(document).ready(function(){
   // peliculas/delete.php?id=<?= $estudiante->Id ?>

$("#btn-delete").on("click", function(){

    let id = $(this).data("id");

    if(confirm("Estas seguro que quieres eliminar a este estudiante?"))
    {
        if(id !== 0)
        {
            window.location.href = "peliculas/delete.php?id=" + id;

        
        }
       
    }


})



})