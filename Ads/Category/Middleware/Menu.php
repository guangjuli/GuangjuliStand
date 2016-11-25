<?php
/*
|--------------------------------------------------------
| 执行初始化操作
|--------------------------------------------------------
| 所有工作任务都可以规划到这个流程当中去,如果不够再重新规划,不破坏现有结构
| 调用方法为 App\Application::run();
|
|
SysMiddlewareEnvini                 => 必要的环境初始化和设置
sc() -> SysMiddlewareConfigini      => 配置文件的初始化和设置
sc() -> SysMiddlewareBusini         => 获得前端信息流模板       -> 获得 bus()
->获得完善完整的sc 和bus 信息模板
//ok 规划完成,交给控制器去执行
|
|
$list = [
      SysMiddlewareEnvini     => '',
      SysMiddlewareConfigini  => '',
      SysMiddlewareBusini     => '',
]
|
|
*/

namespace Middleware;

use Grace\Set\MiddlewareBase;
use Grace\Set\MiddlewareInterface;


class Menu extends MiddlewareBase implements MiddlewareInterface
{
      /*
      |--------------------------------------------------------
      | 定义 中间件主体
      |--------------------------------------------------------
      |
      */
      public function handle($request, \Closure $next)
      {
            return $next($request);
      }

}
