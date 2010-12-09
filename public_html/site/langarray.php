<?php

//Language Array:

function lang(){

$english = array(

'privacypolicy'=>"Privacy Policy",
'aboutus'=>"About Us",
'language'=>"Language",
'english'=>"English",
'spanish'=>"Spanish",

'aboutustext' => "<p>Diddy is a web platform to offer direct democracy for organizations. By providing applications for participation and collaboration, we help organizations collect the voice and feelings of their members.</p>

<p>Diddy was founded in 2010 by Carlos Andreu-Martinez, Richard Kaufman-Lopez, and Daniel Gonzalez-Perez. We are students from the University of Puerto Rico at Mayaguez who are worried about organizations ignoring the voice of their members. We created Diddy to give users the power to clearly transmit their feelings to the organizations they are members of. By having discussions and voting upon them, users have a way of showing quantified decisions that have been taken by the community. This pressures board members to take decisions the community wants, instead of decisions that are only of interest to those who have power and money.</p>

<p>By providing voice and vote to everyone, we hope to change the way the world is being managed.</p>",

'slogan'=>"PUSHING FOR DIRECT DEMOCRACY",
'home'=>"Home",
'startatopic'=>"Start a Topic",
'search'=>"Search",
'joinus'=>"Join Us",
'username'=>"Username",
'password'=>"Password",
'register'=>"Register",
'login'=>"Login",
'usercp'=>"User CP",
'viewprofile'=>"[View Profile]",
'logout'=>"[Logout]",
'homeindex'=>"Home",
'listoftopics'=>"Here is a list of active topics:",
'tagcloud' => "Tag Cloud",
'privacypolicytext' => "This is where our privacy policy should go.",
'searchresults' => "Search Results",
'registertext' => "You can register here.",
'email' => "E-Mail",
'sortby' => "Sort By",
'new' => "New",
'old' => "Old",
'postcomment' => "Post a comment",
'please' => "Please",
'topostcomments' => "to post comments",
'tags' => "Tags",
'addtag' => "Add tag",
'comments' => "Comments",
'toaddatag' => "to add a tag",
'newtagname' => "New Tag Name",
'search' => "Search",
'searchtext' => "Here you can search topics.",
'typeyourqueryhere' => "Type your query here.",
'comment' => "Comment",
'writeyourcommentbelow' => "Write your comment below",
'basicinformation' => "Basic Information",
'registrationdate' => "Registration Date",
'changeavatar' => "Change Avatar",
'threadsstarted' => "Threads Started",
'commentsposted' => "Comments posted",
'startatopic' => "Start a topic",
'topictitle' => "Topic Title",
'topictext' => "Topic Description",
'createtopic' => "Create Topic",
'sorry' => "Sorry",
'first' => "first",
);

$spanish = array(

'privacypolicy'=>"Politica de Privacidad",
'aboutus'=>"Acerca de Nosotros",
'language'=>"Idioma",
'english'=>"Ingles",
'spanish'=>"Espanol",

'aboutustext' => "<p>Diddy es una plataforma que ofrece democracia directa para las organizaciones. Al proveer aplicaciones para participacion y colaboracion, ayudamos a organizaciones a recolectar el sentir de sus miembros.</p>

<p>Diddy fue fundado en 2010 por Carlos Andreu-Martinez, Richard Kaufman-Lopez, y Daniel Gonzalez-Perez. Somos estudiantes de la Universidad de Puerto Rico en Mayaguez que estamos preocupados por las organizaciones que ignoran el sentir de sus miembros. Creamos Diddy para dar a los usuarios el poder de transmitir claramente su sentir a las organizaciones a las que pertenecen. Al tener discuciones y votar sobre ellas, los usuarios tienen como mostrar de manera cuantificada las decisiones que han tomado la comunidad de los usuarios a la organizacion. Esto presiona a los miembros de la junta a tomar decisiones que les interesa a la comunidad, en vez de las decisiones que les interesa solo a los que tienen poder y dinero..</p>

<p>Al proveer voz y voto a todos, esperamos cambiar la manera en que el mundo es manejado.</p>",

'slogan'=>"HACIA LA DEMOCRACIA DIRECTA",
'home'=>"Indice",
'startatopic'=>"Empieza un Tema",
'search'=>"Buscar",
'joinus'=>"Unete",
'username'=>"Nombre de Usuario",
'password'=>"Contrasena",
'register'=>"Registrate",
'login'=>"Entra",
'usercp'=>"Panel de Usr",
'viewprofile'=>"[Ver Perfil]",
'logout'=>"[Salir]",
'homeindex'=>"Indice",
'listoftopics'=>"Lista de temas activos:",
'tagcloud' => "Nube de Tags",
'privacypolicytext' => "Aqui es donde va nuestra politica sobre la privacidad.",
'searchresults' => "Resultados de la busqueda",
'registertext' => "Aqui puede registrarse.",
'email' => "Correo electronico",
'sortby' => "Ordenar por",
'new' => "Nuevo",
'old' => "Viejo",
'postcomment' => "Deje un comentario",
'please' => "Favor de",
'topostcomments' => "para dejar comentarios",
'tags' => "Tags",
'addtag' => "Anadir un tag",
'comments' => "Comentarios",
'toaddatag' => "para anadir un tag",
'newtagname' => "Nuevo tag",
'search' => "Buscar",
'searchtext' => "Aqui puede buscar temas.",
'typeyourqueryhere' => "Entre su busqueda aqui.",
'comment' => "Comente",
'writeyourcommentbelow' => "Entre su comentario debajo.",
'basicinformation' => "Informacion Basica",
'registrationdate' => "Fecha de Registro",
'changeavatar' => "Cambie Su Avatar",
'threadsstarted' => "Temas iniciados por este usuario",
'commentsposted' => "Comentarios dejados por este usuario",
'startatopic' => "Comience un Tema",
'topictitle' => "Titulo del Tema",
'topictext' => "Descripcion del Tema",
'createtopic' => "Cree el Tema",
'sorry' => "Disculpe",
'first' => "primero",
);


if($_COOKIE["evotinglang"] == "spanish"){
return $spanish;
}
else{
return $english;
}

}

?>
