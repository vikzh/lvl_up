<h2>Реализуйте функцию getFreeDomainsCount, которая принимает на вход список емейлов, а возвращает количество емейлов, расположенных на каждом бесплатном домене. Список бесплатных доменов хранится в константе FREE_EMAIL_DOMAINS.
</h2>
<?php

const FREE_EMAIL_DOMAINS = [
    'gmail.com', 'yandex.ru', 'hotmail.com'
];

//better version
function getFreeDomainsCount(array $emails)
{
    $domains = array_map(function ($email) {
        return explode('@', $email)[1];
    }, $emails);

    $freeDomains = array_filter($domains, function ($domain) {
        return in_array($domain, FREE_EMAIL_DOMAINS);
    });


    return array_reduce($freeDomains, function ($acc, $domain) {
        if (!array_key_exists($domain, $acc)) {
            $acc[$domain] = 1;
        } else {
            $acc[$domain] += 1;
        }

        return $acc;
    }, []);
}

// my another ver of function
function getFreeDomainsCount2(array $emails){

    $domains = array_map(function($email){
        return substr(strstr($email, '@'), 1, strlen($email));
    },$emails);

    $filteredDomains = array_filter($domains, function($domain){
        return in_array($domain, FREE_EMAIL_DOMAINS);
    });

    $countOfDomains = array_reduce($filteredDomains, function($acc, $domain){
        if(isset($acc[$domain])){
            $acc[$domain]++;
            return $acc;
        } else {
            $acc[$domain] = 1;
            return $acc;
        }
    }, []);

    return $countOfDomains;
}
$emails = [
    'info@gmail.com',
    'info@yandex.ru',
    'info@hotmail.com',
    'mk@host.com',
    'support@hexlet.io',
    'key@yandex.ru',
    'sergey@gmail.com',
    'vovan@gmail.com',
    'vovan@hotmail.com'
];

getFreeDomainsCount($emails);
# => Array (
#     'gmail.com' => 3
#     'yandex.ru' => 2
#     'hotmail.com' => 2
#  )