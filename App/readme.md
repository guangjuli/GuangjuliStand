
## 页面

- 登录        /login
- 页面模板    /login/temple
- 首页        /
## 模型

- gate
- page
- my
- data

> 对流程走向的判断
- gate
    - isAdmin
    - isLogin
    - isAddons
```
Model('gate')->isAdmin();         //登录界面
Model('gate')->isLogin();         //404界面
Model('gate')->isAddons();        //500界面
```

> 固定页面
- page
    - page404
    - page500
    - pageLogin

```
Model('page')->pageLogin();         //登录界面
Model('page')->page404();         //404界面
Model('page')->page500();         //500界面
```

> 我的所有信息
- my
    - uid
    - user
    - isLogin
    - isAdmin
    - tokon
    - group

> 所有数据
- data


## 前端



对单表的增删改查建立对象

标记

    ID          标识字符
    NOTEMPTY    不能空
    NOTREPEAT   不重复
    INT         整型
    string      字符
    time        时间


