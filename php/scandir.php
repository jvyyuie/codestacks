<?PHP
$path = __DIR__."/WordPress-4.9.1";
$files = [];
scandir_recursive($files, $path, ".php");

print_r($files);


/**
 * @description scandir use recursive mode
 */
function scandir_recursive(array & $files, $path = '.', $ext = ".php")
{
        foreach(array_diff(scandir($path), ['.', '..']) as $file)
        {
                $targetFile = $path.'/'.$file;
                is_dir($targetFile) and scandir_recursive($files, $targetFile, $ext);
                if(is_file($targetFile) && substr($file, -(strlen($ext))) === $ext)
                {
                        $files[] = $targetFile;
                }
        }
}
