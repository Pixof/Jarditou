<?php
// Initialiser la session
session_start();
  
// Détruire la session.
if(session_destroy())
{
  // Redirection vers la page de connexion
  header("Location: http://localhost/DW%202021/Jarditou%20PHP%20V2/App/index.php");
}