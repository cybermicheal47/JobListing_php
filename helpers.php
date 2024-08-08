<?php 

/**
 * Returns the absolute path to the given directory or file.
 *
 * @param string $path The relative path to append to the base directory.
 * @return string The absolute path.
 */
function basePath($path = ''){
  return __DIR__ . '/' . $path;
}

/**
 * Loads a view file if it exists.
 *
 * @param string $name The name of the view file (without extension).
 */
function loadView($name, $data = []){
   $viewpath = basePath("views/{$name}.view.php");
   if(file_exists($viewpath)){
    extract($data);
      require $viewpath;
   } else {
      echo "Unknown loadView path: {$name}";
   }
}

/**
 * Loads a partial view file if it exists.
 *
 * @param string $name The name of the partial view file (without extension).
 */
function loadPartial($name){
  $partialPath = basePath("views/partials/{$name}.php");
  if(file_exists($partialPath)){
    require $partialPath;
  } else {
    echo "Unknown partial path: {$name}";
  }
}

/**
 * Dumps information about a variable in a readable format.
 *
 * @param mixed $value The variable to inspect.
 */
function inspect($value){
   echo '<pre>'; 
   var_dump($value);
   echo '</pre>';
}

/**
 * Dumps information about a variable in a readable format and stops the script.
 *
 * @param mixed $value The variable to inspect and die after dumping.
 */
function inspectandDie($value){
  echo '<pre>'; 
  die(var_dump($value));
  echo '</pre>';
}

?>
