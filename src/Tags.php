<?php

namespace Dcblogdev\Tags;

class Tags
{
    public function get(string $content): string
    {
        //Current year
        $content = str_replace('[year]', date('Y'), $content);

        //Name of website
        $content = str_replace('[appName]', config('app.name'), $content);

        //youtube embeds
        $content = preg_replace_callback("(\[youtube (.*?)])is", function (array $matches) {
            $params = $this->clean($matches);

            //if key exits use it
            $video = $params['//www.youtube.com/watch?v'];
            $width = ($params['width'] ?? '560');
            $height = ($params['height'] ?? '360');

            return "<iframe width='$width' height='$height' src='//www.youtube.com/embed/$video' frameborder='0' allowfullscreen></iframe>";
        }, $content);

        return $content;
    }

    private function clean(array|string $data): array
    {
        // Check if $data is an array and extract the string to be processed.
        $stringToProcess = is_array($data) && isset($data[1]) ? $data[1] : $data;

        // Ensure that the stringToProcess is actually a string.
        if (! is_string($stringToProcess)) {
            // Handle error or return an empty array
            return [];
        }

        $parts = explode(' ', $stringToProcess);
        $params = [];

        foreach ($parts as $part) {
            if (! empty($part)) {
                if (str_contains($part, '=')) {
                    [$name, $value] = explode('=', $part, 2);
                    $value = $this->removeCharsFromString($value);
                    $name = $this->removeCharsFromString($name);
                    $params[$name] = $value;
                } else {
                    $params[] = $this->removeCharsFromString($part);
                }
            }
        }

        return $params;
    }

    private function removeCharsFromString(string $value): string
    {
        $search = ['http:', 'https:', '&quot;', '&rdquo;', '&rsquo;', '&nbsp;'];

        return str_replace($search, '', $value);
    }
}
