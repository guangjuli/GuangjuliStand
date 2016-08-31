## 信息


//todo

### 文件说明
```
/*
 * 对ads目录
 * 固定文件
 * Read.md
 * Api.md
 * Help.md
 * Install.sql      //安装执行
 * Uninstall.sql    //卸载执行
 * Install.lock     //anzhuang 完毕之后写入
 * Config.setup.json 配置表单生成数据
 * Config.data.json 配置表单保存数据
 */
```

### 对package
```
/**
 * package固定方法
 * help     //widget
 * readme   //widget
 * api      //widget
 * depend       //返回depend数据
 * setup        //返回setup界面
 * menu     返回菜单数据 insert 进入menu表
 */
```

### 控制器约定
```
Base/wd/setup   //widget约定存放
Base/wd/setup   //响应
```

### 具体方法
```
/**
 * ads几种调用方式
 * 1 : 返回数据
 * 2 : 返回widget
 * 3 : 响应操作
 */

/**
 * 特殊的
 * 1 : 后台操作界面
 * 2 : 登录模块
 * 3 : 基础信息获取
 * 4 : gate 信息获取
 * 5 : data 数据获取
 */


//        echo $root;
        //D(adsdata('Menu/Home/Data'));
        //echo adsdata('Menu/Home/NavLeft');
       // echo adsdata('Menu/Home/NavLeft');
        //(new \Ads\Menu\Controller\Home\Home())->Nav();
```


# 对ADS对象的说明

#### 实例化
```
\App\Ads::getInstance();
```

#### 协同执行
> 根据地址栏路由进行调用
```
\App\Ads::Run();
```

#### Gui界面
> 调用gui然后根据地址栏进行路由
```
\App\Ads::Gui();
```

#### 包对象
```
//对象
\App\Ads::getInstance()->Package($a);
//方法
\App\Ads::getInstance()->Package($a)->help();   //widget
\App\Ads::getInstance()->Package($a)->api();    //widget
\App\Ads::getInstance()->Package($a)->readme(); //widget

\App\Ads::getInstance()->Package($a)->depend();         //依赖对象
\App\Ads::getInstance()->Package($a)->setup();          //管理界面 widget
\App\Ads::getInstance()->Package($a)->bedepend();       //计算获得
```

#### 控制器中数据调用
\App\Ads::getInstance()->ads($ads,$params);       //计算获得


```
//对包信息的读取
$res = \App\Ads::getInstance()->help('Sim');
$res = \App\Ads::getInstance()->readme('Sim');
$res = \App\Ads::getInstance()->api('Sim');
$res = \App\Ads::getInstance()->DataInfo('Sim');
$res = \App\Ads::getInstance()->DataConfig('Sim');
$res = \App\Ads::getInstance()->DataApi('Sim');
$res = \App\Ads::getInstance()->SqlInstall('Sim');
$res = \App\Ads::getInstance()->SqlUnInstall('Sim');
等同
$res = \App\Ads::getInstance()->package('Sim')->help();
$res = \App\Ads::getInstance()->package('Sim')->readme();
$res = \App\Ads::getInstance()->package('Sim')->api();
$res = \App\Ads::getInstance()->package('Sim')->DataInfo();
$res = \App\Ads::getInstance()->package('Sim')->DataConfig();
$res = \App\Ads::getInstance()->package('Sim')->DataApi();
$res = \App\Ads::getInstance()->package('Sim')->SqlInstall();
$res = \App\Ads::getInstance()->package('Sim')->SqlUnInstall();
```

### 获取数据或者widget
```
$res = \App\Ads::getInstance()->pds('base/home/index',$params);
```

### 封装
```
adsdata  获取ads的接口反馈数据
adsdata($ads,$params);  用于获取接口的数据反馈
```

### widget调用
{widget ads=base/home/index}

#### 封装
```
function smarty_function_widget($_ads = '',$params = []) {
    return \App\Ads::getInstance()->ads($_ads);
}
```

### 在ads中
```
$this->_pds
$this->_p
$this->_d
$this->_s
$this->_params
req('Ads')
req('Abase')
//like
//[Ads] => asdf/asdfasdf/asdf       问好后面的
//[Adsbase] => /Home/Index/         uri 在响应的时候用上
```
