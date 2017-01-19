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

    'accepted'             => ':attributeを承認してください',
    'active_url'           => ':attributeは有効なURLではありません',
    'after'                => ':attributeは:dateより後の日付が必要です',
    'alpha'                => ':attributeは英字で入力してください',
    'alpha_dash'           => ':attributeは英数字とダッシュ(-)及び下線(_)で入力してください',
    'alpha_num'            => ':attributeは英数字で入力してください',
    'array'                => ':attributeではどれかを選択してください',
    'before'               => ':attributeは:dateより前の日付が必要です',
    'between'              => [
        'numeric' => ':attributeには:minから:maxまでの値を指定してください',
        'file'    => ':attributeには:minから:max KBまでのサイズのファイルを指定してください',
        'string'  => ':attributeには:minから:max文字の間で指定してください',
        'array'   => ':attributeには:minから:maxのアイテム数が必要です',
    ],
    'boolean'              => ':attributeは正あるいは誤のどちらかの値が必要です',
    'confirmed'            => ':attributeは確認値と一致しません',
    'date'                 => ':attributeの日付が正しくありません',
    'date_format'          => ':attributeは:formatの形式で入力してください',
    'different'            => ':attributeは:otherと異なる必要があります',
    'digits'               => ':attributeは:digits桁の数が必要です',
    'digits_between'       => ':attributeは:minから:max桁の数が必要です',
    'dimensions'           => ':attributeは不正な画像の次元があります',
    'distinct'             => ':attributeの値は重複しています',
    'email'                => ':attributeは形式が正しくありません',
    'exists'               => ':attributeで選択された値は正しくありません',
    'file'                 => ':attributeはファイルでありません',
    'filled'               => ':attributeはすべてが必須です',
    'image'                => ':attributeには画像ファイルを指定してください',
    'in'                   => ':attributeで選択された値は正しくありません',
    'in_array'             => ':attributeは:otherにありません',
    'integer'              => ':attributeは整数で指定してください',
    'ip'                   => ':attributeには有効なIPアドレスを指定してください',
    'json'                 => ':attributeは不正なJSON文字列です',
    'max'                  => [
        'numeric' => ':attributeには:max以下の値を指定してください',
        'file'    => ':attributeには:max KB以下のファイルを指定してください',
        'string'  => ':attributeには:max文字以下で指定してください',
        'array'   => ':attributeは:maxのアイテム数までです',
    ],
    'mimes'                => ':attributeには:valuesタイプのファイルを指定してください',
    'mimetypes'            => ':attributeには:valuesタイプのファイルを指定してください',
    'min'                  => [
        'numeric' => ':attributeには:min以上の値を指定してください',
        'file'    => ':attributeには:min KB以上のファイルを指定してください',
        'string'  => ':attributeには:min文字以上で指定してください',
        'array'   => ':attributeには:min個以上選択してください',
    ],
    'not_in'               => ':attributeの値は選択できません',
    'numeric'              => ':attributeには数字を指定してください',
    'present'              => ':attributeの項目が必要です',
    'regex'                => ':attributeのお形式は不正です',
    'required'             => ':attributeは必ず指定してください',
    'required_if'          => ':otherがあるときは、:attributeの項目を必ず指定してください',
    'required_unless'      => ':otherがないときは、:attributeの項目を必ず指定してください',
    'required_with'        => ':valuesがあるときは、:attributeの項目も指定してください',
    'required_with_all'    => ':valuesがあるときは、:attributeの項目も指定してください',
    'required_without'     => ':valuesがないときは、:attributeの項目を指定してください',
    'required_without_all' => ':valuesがなにもないときは、:attributeの項目を指定してください',
    'same'                 => ':attributeの項目と:otherは一致しません',
    'size'                 => [
        'numeric' => ':attributeには:sizeを指定してください',
        'file'    => ':attributeには:size KBのファイルでなくてはなりません',
        'string'  => ':attributeには:size文字で指定してください',
        'array'   => ':attributeには:sizeのアイテム数が必要です',
    ],
    'string'               => ':attributeは文字列である必要あります',
    'timezone'             => ':attributeのタイムゾーンは不正です',
    'unique'               => ':attributeで指定された値は既に存在しています',
    'uploaded'             => ':attributeではファイルのアップロードに失敗しました',
    'url'                  => ':attributeの形式が正しくありません',

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

    'attributes' => [
        'email'     => 'メールアドレス',
        'password'  => 'パスワード',
        'name'      => '名前',
    ],

];
