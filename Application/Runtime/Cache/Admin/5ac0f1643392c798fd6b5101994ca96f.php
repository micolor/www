<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="/statics/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="/statics/css/zh-cn-system.css" rel="stylesheet" type="text/css"/>
    <link href="/statics/css/table_form.css" rel="stylesheet" type="text/css"/>
    <link href="/statics/Hplus/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/kindeditor/themes/default/default.css" />
    <link rel="stylesheet" href="/Public/kindeditor/plugins/code/prettify.css" />
    <script charset="utf-8" src="/Public/kindeditor/kindeditor-min.js"></script>
    <script type="text/javascript">
        KindEditor.ready(function(K) {
            editor=K.create('#content', {
                resizeType:1,
                autoHeightMode : true,
                afterBlur: function () { this.sync(); },
                items :['source', '|', 'fullscreen', 'undo', 'redo', 'print', 'cut', 'copy', 'paste',
                    'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                    'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', '|', 'selectall',
                    'title', 'fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold','italic', 'underline', 'strikethrough',
                    'removeformat', '|', 'image','advtable', 'table', 'pagebreak', 'clearhtml','template','quickformat','link', 'unlink']
            });
        });

    </script>
</head>
<body>
<form name="myform" id="myform" action="<?php echo ($act); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="nid" value="<?php echo ($info["nid"]); ?>"/>
    <input type="hidden" name="cacheym" value="<?php echo ($info["cacheym"]); ?>"/>
    <div class="addContent">
        <div class="crumbs">当前位置：新闻 > 新闻发布管理 > 添加内容</div>
        <div class="col-right">
            <div class="col-1">
                <div class="content pad-6">
                    <h6> 缩略图</h6>
                    <div class='upload-pic img-wrap'>
                        <input type="hidden" name="thumb" id="thumb" value="<?php echo ($info["thumb"]); ?>"/>
                        <a href="#">
                            <img id='thumb_img' width='135' height='113' src='<?php echo ($info["tempthumb"]); ?>'/>
                        </a>
                        <div style="width:200px; height:6px;"></div>
                        <input type="button" id="uploadButton" name="imgFile" value="上传缩略图" style=" cursor:pointer">

                    </div>

                    <script type="text/javascript">
                        KindEditor.ready(function (K) {
                            var uploadbutton = K.uploadbutton({
                                button: K('#uploadButton')[0],
                                fieldName: 'imgFile',
                                url: "<?php echo U('Admin/New/ajaximg');?>",
                                afterUpload: function (data) {

                                    if (data.error === 0) {
                                        var url = K.formatUrl(data.url, 'absolute');

                                        K('#thumb').val(url);
                                        K('#thumb_img').attr('src', url);
                                    } else {

                                        alert(data.message);
                                    }
                                },
                                afterError: function (str) {
                                    alert('自定义错误信息: ' + str);
                                }
                            });
                            uploadbutton.fileBox.change(function (e) {
                                uploadbutton.submit();
                            });
                        });
                    </script>

                    <?php if($act=='add'){ ?>
                    <h6> 添加时间</h6>
                    <?php }else{ ?>
                    <h6> 修改时间</h6>
                    <?php } ?>
                    <div id="data" >
                        <div class="form-group" id="data">
                            <label class="font-noraml"></label>
                            <div class="input-group date">
                                <input class="form-control date" name="addtime" value="<?php echo date("Y-m-d H:i:s",time())?>" type="text" size="21" readonly>
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>&nbsp;

                </div>
            </div>
        </div>


        <div class="col-auto">
            <div class="col-1">
                <div class="content pad-6">
                    <table width="100%" cellspacing="0" class="table_form">
                        <tbody>
                        <tr>
                            <th width="80"><font color="red">*</font> 栏目</th>
                            <td>
                                <select name="catid">
                                    <?php if(is_array($Menucache)): $i = 0; $__LIST__ = $Menucache;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['cate_id']); ?>"<?php if($info['catid'] == $vo['cate_id']): ?>selected<?php endif; ?>><?php echo ($vo['cate_name']); ?></option>
                                        <?php if(is_array($vo['lower'])): $i = 0; $__LIST__ = $vo['lower'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($lo['cate_id']); ?>"<?php if($info['catid'] == $lo['cate_id']): ?>selected<?php endif; ?>>&nbsp;├<?php echo ($lo['cate_name']); ?></option>
                                            <?php if(is_array($lo['lower'])): $i = 0; $__LIST__ = $lo['lower'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$loo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($loo['cate_id']); ?>"<?php if($info['catid'] == $loo['cate_id']): ?>selected<?php endif; ?>>&nbsp;└<?php echo ($loo['cate_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th width="80"><font color="red">*</font> 标题</th>
                            <td>
                                <input type="text" style="width:400px;" name="title" id="title" value="<?php echo ($info["title"]); ?>"
                                       class="measure-input " onBlur=""
                                       onkeyup="strlen_verify(this, 'title_len', 90);"/>
                                最多输入<B><span id="title_len">80</span></B> 个字符
                            </td>
                        </tr>
                        <tr>
                            <th width="80"> 关键词</th>
                            <td><input type='text' name='keywords' id='keywords' value="<?php echo ($info["keywords"]); ?>"
                                       style='width:280px' class='input-text'> 多关键词之间用英文下的“,”隔开
                            </td>
                        </tr>
                        <tr>
                            <th width="80"> 来源</th>
                            <td><input type='text' name='source' id="source" value="<?php echo ($info["source"]); ?>"
                                       style='width: 400px;' class='input-text'>
                            </td>
                        </tr>

                        <tr>
                            <th width="80"> 浏览量</th>
                            <td><input type='text' name='hits' id="hits" value="<?php echo ($info["hits"]); ?>" style='width: 400px;'
                                       class='input-text'>&nbsp;&nbsp;填写数字


                            </td>
                        </tr>
                        <tr>
                            <th width="80"> 摘要</th>
                            <td>
                                <textarea name='ndesc' id='desc' style='width:98%;height:50px;'
                                          onkeyup="strlen_verify(this, 'description_len', 255)"><?php echo ($info["ndesc"]); ?></textarea>还可输入<B><span
                                    id="description_len">255</span></B> 个字符
                            </td>
                        </tr>
                        <tr>
                            <th width="80">作者</th>
                            <td><input type='text' name='author' id="author" value="<?php echo ($info["author"]); ?>"
                                       style='width: 400px;' class='input-text'></td>
                        </tr>
                        <tr>
                            <th width="80">地点</th>
                            <td><input type='text' name='address' id="address" value="<?php echo ($info["address"]); ?>"
                                       style='width: 400px;' class='input-text'></td>
                        </tr>
                        <tr>
                            <th width="80" style="color:#F00">是否发布</th>
                            <td>
                                <input name="status" type="radio" value="1"
                                <?php if($info[status]==1 || $act='add'){echo "checked";} ?>
                                /> 发布 &nbsp; &nbsp; &nbsp; &nbsp;
                                <input name="status" type="radio" value="2"
                                <?php if($info[status]==2){echo "checked";} ?>
                                /> 未发布
                            </td>
                        </tr>

                        <tr>
                            <th width="80">视频时长</th>
                            <td><input type='text' name='vtime' id="vtime" value="<?php echo ($info["vtime"]); ?>" style='width: 400px;'
                                       class='input-text'>一小时三十分三十秒格式如 01:30:30
                            </td>
                        </tr>


                        <tr>
                            <th>新闻内容</th>
                            <td><textarea name='content' id="content" style="width:637px; height:400px; max-width:637px;resize:none;"><?php echo ($info["content"]); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="80"> 分页方式</th>
                            <td><select name="paginationtype" id="paginationtype"
                                        onchange="if(this.value==1)$('#paginationtype1').css('display','');else $('#paginationtype1').css('display','none');">
                                <option value="0"
                                <?php if($info[paginationtype]=='0'){echo "selected";} ?>
                                >不分页</option>
                                <option value="1"
                                <?php if($info[paginationtype]=='1'){echo "selected";} ?>
                                >自动分页</option>
                                <option value="2"
                                <?php if($info[paginationtype]=='2'){echo "selected";} ?>
                                >手动分页</option>
                            </select>
                                <span id="paginationtype1"
                                <?php if($info[paginationtype]!='1'){echo 'style="display:none"';} ?>
                                ><input name="maxcharperpage" class='input-text' style="width:100px;" type="text"
                                        id="maxcharperpage" value="<?php echo ($info["maxcharperpage"]); ?>" size="8" maxlength="8">字符数（包含HTML标记）</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </div>

    <div class="fixed-bottom">
        <div class="fixed-but text-c">
            <div class="button"><input value="保存后自动关闭" name="dosubmit" class="cu" style="width:145px;" onclick=do_btn("<?php echo ($act); ?>",1)></div>
            <?php if($act=='add'){ ?>
            <div class="button"><input value="保存并继续发表" name="dosubmit" onclick=do_btn("<?php echo ($act); ?>",2) class="cu" style="width:130px;"></div>
            <?php } ?>
        </div>
    </div>
    <script src="/statics/Hplus/js/jquery.min.js?v=2.1.4"></script>
    <script src="/statics/Hplus/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <!-- layer javascript -->
    <script src="/statics/Hplus/js/plugins/layer/layer.min.js"></script>

    <script>
        /**
         * 提交表单
         * @param url
         * @param type
         */
        function do_btn(url,type){
            $.post(
                    url,
                    $(myform).serialize(),
                    function(data){
                        layer.msg(data.info, {icon:1,time:2000});
                        if(data.status==1){
                            $('#content-main', window.parent.document).find('.J_iframe').each(function(index){
                                if($(this).css('display')=='inline'){
                                    $(this).attr("src",$(this).attr('src'));
                                };
                            });
                            if(type==1){
                                setTimeout(function () {
                                    var wname=window.name;
                                    var index = parent.layer.getFrameIndex(wname);
                                    parent.layer.close(index);
                                }, 1000);
                            }
                        }
                    }
            )
        }
        $(function() {
            var myDate = new Date();
            var times = myDate.getHours() + ":" + myDate.getMinutes() + ":" + myDate.getSeconds();
            $('#data .input-group.date').datepicker({
                format: "yyyy-mm-dd "+times,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            })
        })
    </script>
</form></body>
</html>