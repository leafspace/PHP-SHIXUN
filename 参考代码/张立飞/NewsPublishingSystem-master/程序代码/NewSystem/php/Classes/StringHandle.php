<?php
    class StringHandle {
        function findDivString($innerCode) {
            $innerCode = substr($innerCode, strpos($innerCode, '<div contenteditable="true" class="froala-element not-msie f-basic" spellcheck="false" data-placeholder="Type something" style="outline: 0px;">'));
            $innerCode = substr($innerCode, strpos($innerCode, '>') + 1);

            $lastIndex = strripos($innerCode, '</div>');
            $innerCode = substr($innerCode, 0, $lastIndex);
            return $innerCode;
        }

        function findDivText($innerCode) {
            return substr(strip_tags($innerCode), 0, 60);
        }
    }
?>