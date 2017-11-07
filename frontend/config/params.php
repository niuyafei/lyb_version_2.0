<?php
return [
    'adminEmail' => 'admin@example.com',
    //支付宝接口配置
    'alipay_config' => [
        //应用ID,您的APPID
        'app_id' => "2017110109659857",
        //商户私钥
        'merchant_private_key' => "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCg9CrUWsUHlA1IoftVlN7ApljZaOiow2wH5b4Slc2Dn/AgGV8AH90Q1rKeDl5/tQYlw7fBrRrKlOkss6L99ejMez3ynUqPOgai/yOd+fBcHt/emg3K6k37xTUUVk+9/zZxNm/AbOQwa1MD6gd1PvsRwPKYA3NGXyP7IY4JhkAxFkmVv9VmBms6Ja/oq7nOCxKC/AlFCFKYAakg6dK0UvJN77aesBtJjDfrDVhKho3LWOl1ldxIWC7eGmm2Mb4Nzufp0HHn97pQnjQRJqAUDUEwbeuf/614JK7Ms0AZ8CpAHw9Z7KLPxAKsfL6bzjHdyz/jUt7pHUvyVFEDYm7InzzBAgMBAAECggEAdrHZa+TMbDxIV4ns2T4BzzxdRWdSPDJxVpmcRARpHGo0INfU8TiORD6wVlLuaWtL70mYF6Haog6Srj6DMpnIZhN0qZhJRbpa7pUM5RFOqgCyw2wEQ+HqRIM4E5lbERhGQ9MLMnKbDQH4pGhPu60IZh1OScAxoHHFDQu/vVJdwFQtuz5lZIb6bDghQvHAsWG93f+RgvKYrcaqD0/nX6bh34p3MEy+UkpllC74PbUZSuxb62z2SjpcIJcK+ygOjMwP+d7PYBcE26uob9w3LruUHUVioYG+KXsx3K5jqkWioDC2LYAfgILGRsRP9fNRxO5DjHN4U6Cf1X9Q0uKwuLjz4QKBgQDSC0T764TKzYOBIQfVxlGCGLVG5RACDlRC8nqhte1fXMvgq4Qpx0WDs1r2AQjv5XwGjZA+arhZzYLIzDF4d7kXIC+nY/crnGjvgKnu7iEKEOGLZKuStWpjQXCr12Pr4xuNeWOrC7cIAADBNw0ql1bPbRkgP/SrbtmafyyUrOL5JQKBgQDEK1CWXJkWQ4mAeUsdyCC1rM8FD3IXu1AcV60j9zZ58DIBpTj7KjzUymBKQbUtGDpPFMP//XdJrTy0NwivVFN3tFSP1OUE39+FUQQWFMch5jeYDnjmD3kNGA+3YACcs81JQH4NBjfkAWFU9feu+WqS63ZOO7K7KAxog1KzecoIbQKBgQCoPDaIwN+fwHQwHVC1PR9T4I5xtk7YFroO1UC7/Yee9iimTzqQa/eVwTZ+C94op9prNT/vfnMiGqVCR6roHpy1lSYWIM98ss6p5pg1s63q7hJ5H6z82SnZTjT8roxuB32uFyhpe/yh/76bA4kcMBNsGKojVpaWKTdJs8r1WnSBsQKBgFRy5SVlxY19E5OYI8s1XUd4lkJybMZkn88ju2iRQwVpbs2giBAwFbHxUVSGRu2b0XY71Ui9n/26szhNvNJlte0BV6n3l4PqsHne76hl13fzeJlgGZHItW76ncFudbT//m77cYg/1g20vmbp4G+V9dg7v1lcf8vsKLNRXWfgFSZdAoGAL+s0VvMEhQf1tq712/o7VFCIfYGUfmZTR47BhpId29gg6TStmFY+WzLzH1ksJ8Va0FOH3KQSaXqGQDEhkYblFWEa/riZcXVLBVMaGe6Jmzis3IEVj50sWvsDmUrr9mGPECnx9NthMRbZT1jKn/iPIitJSAXdEm3USLD2z1QXVmk=",
        //异步通知地址
        'notify_url' => "http://helper.liuyangbang.cn/alipay/notifyurl",
        //同步跳转
        'return_url' => "http://helper.liuyangbang.cn/alipay/returnurl.php",
        //编码格式
        'charset' => "UTF-8",
        //签名方式
        'sign_type'=>"RSA2",
        //支付宝网关
        'gatewayUrl' => "https://openapi.alipay.com/gateway.do",
        //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
        'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAmCvFSz+kCq4f+CTFllU7aFmVStLBn2F3ryuyrZg7XXwnwrdRLNZtbNxIcMrlX0u8Ih0Tt+0Uq/+b/tTpQ5yGE51luoKpNUPVMynpIg/U+m0grsaMcmCP4Ns6wfhCjXh6ddAyntXfE/22irrik6X27dHypRzM874OMVqpFDdHuEGX21zEUSV2I42CIv/MXvbCjrAlb0ZkKxHRWG8i1uYah/bWRA0T1fzgoZDhis719S4Sy+l3PtkPwSBX1QrK75RvznU4SIYCJiE1XpriagvDSHpoMUAv/Nm5yn+Hu9bDF6pxghFnIk80+pa6ECnpKv4r1BzoPRDyRqm6EOnTfWLSlQIDAQAB",
    ],
];
