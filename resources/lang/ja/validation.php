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

    'accepted'             => '承認してください',
    'active_url'           => '有効なURLではありません',
    'after'                => ':dateより前です',
    'alpha'                => 'アルファベットのみで入力してください',
    'alpha_dash'           => '英数字とダッシュ(-)及び下線(_)で入力してください',
    'alpha_num'            => '英数字で入力してください',
    'array'                => 'どれかを選択してください',
    'before'               => ':dateより前です',
    'between'              => [
        'numeric' => ':minから:maxまでの値を指定してください',
        'file'    => ':minから:max KBまでのサイズのファイルを指定してください',
        'string'  => ':minから:max文字の間で指定してください',
        'array'   => ':minから:maxのアイテム数が必要です',
    ],
    'boolean'              => '正あるいは誤のどちらかの値です',
    'confirmed'            => '確認フィールドと一致していません',
    'date'                 => '日付が正しくありません',
    'date_format'          => ':formatのフォーマットと違います',
    'different'            => ':otherには異なった内容を指定してください',
    'digits'               => ':digits桁の数です',
    'digits_between'       => ':minから:max桁の数です',
    'distinct'             => '値が重複しています',
    'email'                => 'メールアドレスの形式が正しくありません',
    'exists'               => '選択された項目は正しくありません',
    'file'                 => 'ファイルでありません',
    'filled'               => ':attributeの項目が必須です',
    'image'                => '画像ファイルを指定してください',
    'in'                   => '選択されたこの項目は正しくありません',
    'in_array'             => ':attributeの項目は、:otherにありません',
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
    'min'                  => [
        'numeric' => ':min以上の値を指定してください',
        'file'    => ':min KB以上のファイルを指定してください',
        'string'  => ':min文字以上で指定してください',
        'array'   => ':minつ以上選択してください',
    ],
    'not_in'               => 'この値は選択できません',
    'numeric'              => '数字を指定してください',
    'present'              => ':attributeの項目が必要です',
    'regex'                => ':attributeのフォーマットは不正です',
    'required'             => '必ず指定してください',
    'required_if'          => '必ず指定してください',
    'required_unless'      => ':attribute field is required unless :other is in :values.',
    'required_with'        => 'この項目も指定してください',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'この項目も指定してください',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => ':otherと一致しません',
    'size'                 => [
        'numeric' => ':sizeを指定してください',
        'file'    => ':size KBのファイルでなくてはなりません',
        'string'  => ':size文字で指定してください',
        'array'   => ':sizeのアイテム数が必要です',
    ],
    'string'               => '文字列である必要あります',
    'timezone'             => 'タイムゾーンが不正です',
    'unique'               => '指定された値は既に存在しています',
    'url'                  => 'フォーマットが正しくありません',

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
