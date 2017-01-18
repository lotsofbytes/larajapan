<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => '「:attribute」を承認してください',
    'active_url'           => '「:attribute」は、有効なURLではありません',
    'after'                => '「:attribute」は、:dateより後の日付が必要です',
    'alpha'                => '「:attribute」は、アルファベットのみで入力してください',
    'alpha_dash'           => '「:attribute」は、英数字とダッシュ(-)及び下線(_)で入力してください',
    'alpha_num'            => '「:attribute」は、英数字で入力してください',
    'array'                => '「:attribute」では、どれかを選択してください',
    'before'               => '「:attribute」は、:dateより前の日付が必要で',
    'between'              => [
        'numeric' => '「:attribute」では、:minから:maxまでの値を指定してください',
        'file'    => '「:attribute」では、:minから:max KBまでのサイズのファイルを指定してください',
        'string'  => '「:attribute」では、:minから:max文字の間で指定してください',
        'array'   => '「:attribute」では、:minから:maxのアイテム数が必要です',
    ],
    'boolean'              => '「:attribute」は、正あるいは誤のどちらかの値が必要です',
    'confirmed'            => '「:attribute」は、確認値と一致していません',
    'date'                 => '「:attribute」の日付が正しくありません',
    'date_format'          => '「:attribute」は、:formatの形式と違います',
    'different'            => '「:attribute」は、:otherと異なる必要があります',
    'digits'               => '「:attribute」は、:digits桁の数が必要です',
    'digits_between'       => '「:attribute」は、:minから:max桁の数が必要です',
    'dimensions'           => '「:attribute」は、不正な画像の次元があります',
    'distinct'             => '「:attribute」は、値が重複しています',
    'email'                => '「:attribute」は、形式が正しくありません',
    'exists'               => '「:attribute」で選択された値は正しくありません',
    'file'                 => '「:attribute」は、ファイルでありません',
    'filled'               => '「:attribute」は、はすべてが必須です',
    'image'                => '「:attribute」では、画像ファイルを指定してください',
    'in'                   => '「:attribute」で選択された値は正しくありません',
    'in_array'             => '「:attribute」は、:otherにありません',
    'integer'              => '「:attribute」は、整数で指定してください',
    'ip'                   => '「:attribute」では、有効なIPアドレスを指定してください',
    'json'                 => '「:attribute」の値は、不正なJSON文字列です',
    'max'                  => [
        'numeric' => '「:attribute」では、:max以下の値を指定してください',
        'file'    => '「:attribute」では、:max KB以下のファイルを指定してください',
        'string'  => '「:attribute」では、:max文字以下で指定してください',
        'array'   => '「:attribute」では、:maxのアイテム数までです',
    ],
    'mimes'                => '「:attribute」では、:valuesタイプのファイルを指定してください',
    'mimetypes'            => '「:attribute」では、:valuesタイプのファイルを指定してください',
    'min'                  => [
        'numeric' => '「:attribute」では、:min以上の値を指定してください',
        'file'    => '「:attribute」では、:min KB以上のファイルを指定してください',
        'string'  => '「:attribute」では、:min文字以上で指定してください',
        'array'   => ':「:attribute」では、min個以上選択してください',
    ],
    'not_in'               => '「:attribute」の値は選択できません',
    'numeric'              => '「:attribute」では、数字を指定してください',
    'present'              => '「:attribute」の項目が必要です',
    'regex'                => '「:attribute」の形式は不正です',
    'required'             => '「:attribute」は、必ず指定してください',
    'required_if'          => '「:other」があるときは、「:attribute」は必ず指定してください',
    'required_unless'      => '「:other」がないときは、「:attribute」は必ず指定してください',
    'required_with'        => '「:values」があるときは、「:attribute」の項目も指定してください',
    'required_with_all'    => '「:values」があるときは、「:attribute」の項目も指定してください',
    'required_without'     => '「:values」がないときは、「:attribute」の項目も指定してください',
    'required_without_all' => '「:values」がなにもないときは、「:attribute」の項目も指定してください',
    'same'                 => '「:attribute」と「:other」は一致しません',
    'size'                 => [
        'numeric' => '「:attribute」では、:sizeを指定してください',
        'file'    => '「:attribute」では、:size KBのファイルでなくてはなりません',
        'string'  => '「:attribute」では、:size文字で指定してください',
        'array'   => '「:attribute」では、:sizeのアイテム数が必要です',
    ],
    'string'               => '「:attribute」は文字列である必要あります',
    'timezone'             => '「:attribute」のタイムゾーンが不正です',
    'unique'               => '「:attribute」で指定された値は既に存在しています',
    'uploaded'             => '「:attribute」のファイルのアップロードに失敗しました',
    'url'                  => '「:attribute」の形式が正しくありません',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
