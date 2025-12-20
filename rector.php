<?php

use Rector\Config\RectorConfig;
use Rector\Php55\Rector\FuncCall\GetCalledClassToStaticClassRector;
use Rector\Php70\Rector\FuncCall\MultiDirnameRector;
use Rector\Php74\Rector\Property\RestoreDefaultNullToNullableTypePropertyRector;
use Rector\Php82\Rector\New_\FilesystemIteratorSkipDotsRector;
use Rector\Set\ValueObject\SetList;

// return RectorConfig::configure()
//     ->withSets([SetList::PHP_82,SetList::PHP_83,SetList::PHP_84])
//     ->withPhpVersion(\Rector\ValueObject\PhpVersion::PHP_84)
//     ->withRules([
//         RestoreDefaultNullToNullableTypePropertyRector::class,
//         Rector\Php84\Rector\Param\ExplicitNullableParamTypeRector::class,
//     ]);
$rectorConfig = RectorConfig::configure()
    // ->withSets([SetList::PHP_84])
    // ->withPhpVersion(\Rector\ValueObject\PhpVersion::PHP_84)
    ->withPhpSets(php84: true)
    ->withPhpVersion(\Rector\ValueObject\PhpVersion::PHP_84)
    ->withRules([
        // 启用 ExplicitNullableParamTypeRector 规则
        // Rector\Php84\Rector\Param\ExplicitNullableParamTypeRector::class,
    ])->withSkip([
        Rector\Php84\Rector\MethodCall\NewMethodCallWithoutParenthesesRector::class,
        Rector\Php83\Rector\ClassMethod\AddOverrideAttributeToOverriddenMethodsRector::class,
        Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector::class,
        Rector\Php81\Rector\FuncCall\NullToStrictStringFuncCallArgRector::class,

        Rector\Php80\Rector\Catch_\RemoveUnusedVariableInCatchRector::class,
        Rector\CodingStyle\Rector\Closure\ClosureDelegatingCallToFirstClassCallableRector::class,
        Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector::class,
        Rector\Php70\Rector\Ternary\TernaryToNullCoalescingRector::class,
        Rector\Php80\Rector\Class_\StringableForToStringRector::class,
        Rector\Php81\Rector\Array_\ArrayToFirstClassCallableRector::class,
        Rector\CodingStyle\Rector\FuncCall\FunctionFirstClassCallableRector::class,
        
        // 添加其他需要忽略的规则
        Rector\Php80\Rector\FuncCall\ClassOnObjectRector::class,
        Rector\Php55\Rector\FuncCall\GetCalledClassToSelfClassRector::class,
        Rector\Php70\Rector\MethodCall\ThisCallOnStaticMethodToStaticCallRector::class,
        Rector\Php80\Rector\Identical\StrStartsWithRector::class,
        Rector\Php80\Rector\NotIdentical\StrContainsRector::class,
        Rector\Php84\Rector\Foreach_\ForeachToArrayAnyRector::class,
        Rector\Php84\Rector\Class_\DeprecatedAnnotationToDeprecatedAttributeRector::class,
        Rector\TypeDeclaration\Rector\ClassMethod\ReturnNeverTypeRector::class,
        Rector\Php80\Rector\Switch_\ChangeSwitchToMatchRector::class,
        Rector\Php55\Rector\String_\StringClassNameToClassConstantRector::class,
        MultiDirnameRector::class,
        FilesystemIteratorSkipDotsRector::class,
        GetCalledClassToStaticClassRector::class,
    ]);

return $rectorConfig;