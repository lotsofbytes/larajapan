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
    'active_url'           => '有効なURLではありません',
    'after'                => ':dateより後の日付が必要です',
    'alpha'                => 'アルファベットのみで入力してください',
    'alpha_dash'           => '英数字とダッシュ(-)及び下線(_)で入力してください',
    'alpha_num'            => '英数字で入力してください',
    'array'                => 'どれかを選択してください',
    'before'               => ':dateより前の日付が必要で',
    'between'              => [
        'numeric' => ':minから:maxまでの値を指定してください',
        'file'    => ':minから:max KBまでのサイズのファイルを指定してください',
        'string'  => ':minから:max文字の間で指定してください',
        'array'   => ':minから:maxのアイテム数が必要です',
    ],
    'boolean'              => '正あるいは誤のどちらかの値が必要です',
    'confirmed'            => '確認値と一致しません',
    'date'                 => 'の日付が正しくありません',
    'date_format'          => ':formatの形式と違います',
    'different'            => ':otherと異なる必要があります',
    'digits'               => ':digits桁の数が必要です',
    'digits_between'       => ':minから:max桁の数が必要です',
    'dimensions'           => '不正な画像の次元があります',
    'distinct'             => '値が重複しています',
    'email'                => '形式が正しくありません',
    'exists'               => '選択された値は正しくありません',
    'file'                 => 'ファイルでありません',
    'filled'               => 'はすべてが必須です',
    'image'                => '画像ファイルを指定してください',
    'in'                   => '選択された値は正しくありません',
    'in_array'             => ':otherにありません',
    'integer'              => '整数で指定してください',
    'ip'                   => '有効なIPアドレスを指定してください',
    'json'                 => '不正なJSON文字列です',
    'max'                  => [
        'numeric' => ':max以下の値を指定してください',
        'file'    => ':max KB以下のファイルを指定してください',
        'string'  => ':max文字以下で指定してください',
        'array'   => ':maxのアイテム数までです',
    ],
    'mimes'                => ':valuesタイプのファイルを指定してください',
    'mimetypes'            => ':valuesタイプのファイルを指定してください',
    'min'                  => [
        'numeric' => ':min以上の値を指定してください',
        'file'    => ':min KB以上のファイルを指定してください',
        'string'  => ':min文字以上で指定してください',
        'array'   => ':min個以上選択してください',
    ],
    'not_in'               => '値は選択できません',
    'numeric'              => '数字を指定してください',
    'present'              => '項目が必要です',
    'regex'                => '形式は不正です',
    'required'             => '必ず指定してください',
    'required_if'          => '「:other」があるときは、この項目は必ず指定してください',
    'required_unless'      => '「:other」がないときは、この項目は必ず指定してください',
    'required_with'        => '「:values」があるときは、この項目も指定してください',
    'required_with_all'    => '「:values」があるときは、この項目も指定してください',
    'required_without'     => '「:values」がないときは、この項目も指定してください',
    'required_without_all' => '「:values」がなにもないときは、この項目も指定してください',
    'same'                 => 'この項目と「:other」は一致しません',
    'size'                 => [
        'numeric' => ':sizeを指定してください',
        'file'    => ':size KBのファイルでなくてはなりません',
        'string'  => ':size文字で指定してください',
        'array'   => ':sizeのアイテム数が必要です',
    ],
    'string'               => '文字列である必要あります',
    'timezone'             => 'のタイムゾーンが不正です',
    'unique'               => '指定された値は既に存在しています',
    'uploaded'             => 'ファイルのアップロードに失敗しました',
    'url'                  => 'URLの形式が正しくありません',

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
