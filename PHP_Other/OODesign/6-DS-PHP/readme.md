Реализуйте функцию compare, которая сравнивает две строчки набранные в редакторе. Если они равны то возвращает true, иначе - false. Особенность строчек в том они могут содержать символ #, который означает нажатие клавиши Backspace. То есть перед самим сравнением, нужно вычислить реальную строчку отображенную в редакторе.
```
<?php

compare('ab#c', 'ab#c'); // true
compare('ab##', 'c#d#'); // true
compare('a#c', 'b'); // false