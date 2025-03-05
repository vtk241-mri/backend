<?php
/**
 * Клас для роботи з файлами в директорії "text".
 */
namespace Text;
class Text
{
    /** @var string Директорія, де знаходяться файли */
    private static $dir = "text";

    /**
     * Читає вміст файлу.
     *
     * @param string $filename Ім'я файлу
     * @return string|false Вміст файлу або false у разі помилки
     */
    public static function readFile($filename)
    {
        $path = self::$dir . "/" . $filename;
        if (file_exists($path)) {
            return file_get_contents($path);
        } else {
            return "Файл не знайдено!";
        }
    }

    /**
     * Записує (додає) текст у файл.
     *
     * @param string $filename Ім'я файлу
     * @param string $content Текст для запису
     * @return void
     */
    public static function writeFile($filename, $content)
    {
        $path = self::$dir . "/" . $filename;
        file_put_contents($path, $content . PHP_EOL, FILE_APPEND);
    }

    /**
     * Очищає вміст файлу.
     *
     * @param string $filename Ім'я файлу
     * @return void
     */
    public static function clearFile($filename)
    {
        $path = self::$dir . "/" . $filename;
        file_put_contents($path, "");
    }
}
?>