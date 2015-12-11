<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form role="form" id="formngale" action="php/controller/galeria.controller.php?op=editar" method="post">
    <div class="form-group fg-line">
        <label for="exampleInputEmail1">Título de la Galeria</label>
        <input type="hidden" id ="cod" name="cod" value="ga007">
         <input id="nom_tit" name="titu" required type="text" class="form-control" placeholder="Nombre">
    </div>
    <div class="form-group fg-line">
        <label for="exampleInputEmail1">Imagen Galeria</label>
         <input name="img"  type="file" class="form-control" >                                                
    </div>                                
    <button type="submit"  class="btn btn-primary btn-sm m-t-10 waves-effect">Modificar</button>
    <a onclick="ocultaformulario();"  class="btn btn-danger btn-sm m-t-10 waves-effect">Cancelar</a>
</form>

</body>
</html>