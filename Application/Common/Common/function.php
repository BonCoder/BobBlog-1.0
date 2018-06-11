<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/14
 * Time: 19:58
 */
function show_model_error($model) {
    // 得到model中的错误信息
    $errors = $model->getError();
    $errorMsg = '<ul>';
    if (is_array($errors)) {
        // 如果是数组将错误信息拼成一个ul
        foreach ($errors as $error) {
            $errorMsg .= "<li style='list-style-type:decimal'>{$error}</li>";
        }
    } else {
        $errorMsg .= "<li style='list-style-type:decimal'>{$errors}</li>";
    }
    $errorMsg .= '</ul>';
    return $errorMsg;
}