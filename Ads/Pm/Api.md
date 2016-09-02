#Base


##数据源样例

```
{
	"ads1.1":	{
		"ads":"base3",
		"title":"title",
		"version":"1.1",
		"des":"基础信息",
		"necessary":1,
		"zip":"http:\/\/my.so\/lib\/1.1.zip",
        "exclusive":
            {
                "base":"1.1",
                "base2":"1.1"
            }
		"depend":
			{
				"base":"1.1",
				"base2":"1.1"
			}
	},
	"ads1.2":	{
		"ads":"base3",
		"title":"title2",
		"version":"1.2",
		"des":"基础信息",
		"necessary":1,
		"zip":"http:\/\/my.so\/lib\/1.2.zip",
		"depend":
			{
				"base":"1.1",
				"base2":"1.1"
			}
	},
	"adss1.2":	{
		"ads":"adss1",
		"title":"title3",
		"version":"1.2",
		"necessary":1,
		"des":"基础信息",
		"zip":"http:\/\/my.so\/lib\/1.3.zip",
		"depend":
			{
				"base":"1.1",
				"base2":"1.1"
			}
	}


}
```
