<?php

function isBalanced($input) {
    // Peta untuk pasangan bracket
    $bracketPairs = [
        ')' => '(',
        ']' => '[',
        '}' => '{'
    ];

    // Stack untuk menyimpan bracket pembuka
    $stack = [];

    for ($i = 0; $i < strlen($input); $i++) {
        $char = $input[$i];

        // Jika pembuka
        if (in_array($char, ['(', '{', '['])) {
            // Push aray
            array_push($stack, $char);
        }
        // Jika penutup
        elseif (in_array($char, [')', '}', ']'])) {
            // Cek kecocokan dengan bracket pair
            if (empty($stack) ) {
                return 'NO';
            }
        }
    }

    // Determine stack is
    return empty($stack) ? 'YES' : 'NO';
}

// Example Input 
$inputs = [
    "{ [ ( ) ] }",
    "{ [ ( ]) }",
    "{ ( ( [ ] ) [ ] ) [ ] }"
];

foreach ($inputs as $input) {
    echo "Input: $input\n";
    echo "Output: " . isBalanced($input) . "\n\n";
}

?>