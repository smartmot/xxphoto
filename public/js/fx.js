const f = {
    d(form){
        return new FormData(form);
    },
    f(form){
        var formdata;
        $(form).submit(function (event){
            event.preventDefault();
            formdata = new FormData(this);
        });
        $(form).submit();
        return formdata;
    },
    s(obs={}){
        var formdataz = new FormData();
        for(var i=0;i<Object.keys(obs).length;i++){
            formdataz.append(Object.keys(obs)[i], obs[Object.keys(obs)[i]]);
        }
        return formdataz;
    },
    x(){
        return new XMLHttpRequest();
    },
    r(fn,options){
        const req = this.x();
        if (!options.t){
            req.responseType = "text";
        }else{
            req.responseType = options.t;
        }
        req.onreadystatechange = function (){
            if (req.readyState === 4){
                if (fn.d){
                    fn.d(req.response);
                }
            }else{
                if (fn.e){
                    fn.e(req.readyState,req.responseText,req.response);
                }
            }
        }
        if (fn.p){
            req.upload.onprogress = function (status) {
                let progress = (status.loaded/status.total)*100;
                fn.p(status,progress,req);
            }
        }
        if (fn.ps){
            req.onprogress = function () {
                fn.ps();
            }
        }
        if (fn.r){
            fn.r(req);
        }
        req.open(options.m,options.target, true);
        req.send(options.x);
    },
    i(dataobj){
        let dataform = new FormData();
        let datakeys = Object.keys(dataobj);
        for (let datai = 0; datai < datakeys.length; datai++){
            dataform.append(datakeys[datai], dataobj[datakeys[datai]]);
        }
        return dataform;
    }
};

const srtz = function (objz,sortby,direct='desc'){
    switch (direct){
        case "asc":
            return objz.sort(function (sone,stwo) {
                if (sone[sortby] < stwo[sortby]){
                    return 1;
                }else if (sone[sortby] > stwo[sortby]){
                    return -1;
                }else{
                    return 0;
                }
            });
            break;
        case "desc":
            return objz.sort(function (sone,stwo) {
                if (sone[sortby] > stwo[sortby]){
                    return 1;
                }else if (sone[sortby] < stwo[sortby]){
                    return -1;
                }else{
                    return 0;
                }
            });
            break;
    }
};

const img = {
    load(src, fn){
        let image = new Image();
        image.src = src;
        image.onload = function () {
            fn(image);
        };
    },
};

const $f = {
    x(ele,oncrop,option={ratio:(16/9)}){
        return new _$(ele,{
            aspectRatio:option.ratio,
            zoomable:true,
            dragMode:"move",
            viewMode:1,
            cropBoxResizable:false,
            cropBoxMovable:false,
            minCropBoxWidth:30,
            responsive:true,
            guides:false,
            movable:true,
            highlight:true,
            crop(data){
                cdata = {
                    width:data.detail.width,
                    height:data.detail.height,
                    x:data.detail.x,
                    y:data.detail.y,
                    r:data.detail.rotate,
                };
                oncrop(cdata);
            }
        });
    }
}
const _e = {
    n(name,index=0){
        return document.getElementsByName(name)[index];
    }
}
let $_i = [];
let $_c = {
    config:""
};
Object.defineProperty(Object.prototype,"watch",{
    writable:true,
    enumerable:false,
    configurable:true,
    value:function (prop, handler){
        var oldval = this[prop],
            newval = oldval,
            getter = function () {
                return newval;
            },
            setter = function (val) {
                oldval = newval;
                return newval = handler.call(this, prop, oldval, val);
            };
        if (delete this[prop]) { // can't watch constants
            Object.defineProperty(this, prop, {
                get: getter
                , set: setter
                , enumerable: true
                , configurable: true
            });
        }
    }
});

const a_a = {
    date:function (date, format='general', seperator='-'){
        let dmy = date.split("-");
        switch (format){
            case "general":
                return numeral(dmy[2]).format("00") + seperator + numeral(dmy[1]).format("00") + seperator + dmy[0];
                break;
            default:
                return numeral(dmy[2]).format("00") + seperator + this.month[parseInt(dmy[1])] + seperator + dmy[0];
        }
    },
    month:{
        1:"មករា",
        2:"កុម្ភៈ",
        3:"មីនា",
        4:"មេសា",
        5:"ឧសភា",
        6:"មិថុនា",
        7:"កក្កដា",
        8:"សីហា",
        9:"កញ្ញា",
        10:"តុលា",
        11:"វិច្ឆិកា",
        12:"ធ្នូរ",
    },
    mon:function (monz, separator =' '){
        let ym = monz.split("-");
        return this.month[parseInt(ym[1])] + separator + ym[0];
    }
    ,
    money:function (money,currency){
        switch (currency){
            case "riel":
                return numeral(money).format('0,0') + "៛";
                break;
            case "usd":
                return numeral(parseFloat(money)).format('0,0.00$');
                break;
            case "baht":
                return numeral(money).format('0,0') + "បាត";
                break;
            default:
                return numeral(parseFloat(money)).format('$0,0.00');
                break;
        }
    },
    _usd:function (money=0,currency="usd",config=[]){
        let _this = this;
        let giveback = 0;
        switch (currency){
            case "usd":
                giveback = money;
                break;
            case "riel":
                giveback = money/config.riel_usd;
                break;
            case "baht":
                giveback = money/config.baht_usd
                break;
        }
        return giveback;
    },
    prn:function (print_file, copies=1){
        JSPM.JSPrintManager.auto_reconnect = true;
        JSPM.JSPrintManager.start();
        JSPM.JSPrintManager.WS.onStatusChanged = function () {
            if (JSPM.JSPrintManager.websocket_status == JSPM.WSStatus.Open) {
                var cpj = new JSPM.ClientPrintJob();
                var myPrinter = new JSPM.InstalledPrinter("Canon TS6100 series", true);
                myPrinter.paperName = "A5";
                myPrinter.trayName = "Automatically Select";
                myPrinter.pageSizing = "Fit";
                myPrinter.printAutoCenter = true;
                cpj.clientPrinter = myPrinter;
                var my_file = new JSPM.PrintFilePDF(print_file, JSPM.FileSourceType.URL, 'MyFile.pdf', copies);
                cpj.files.push(my_file);
                cpj.sendToClient();
            }
        };
    },
    currency:function (curr){
        return ({usd:"ដុល្លា", riel:"រៀល", baht:"បាត"})[curr];
    }
}
/**
 *
 * @param handler
 * @param timer
 * @returns {number}
 * @private
 */
const t_ = function (handler=(()=>{}),timer=30){
    return setTimeout(handler, timer);
};
const _f = () =>{
    return {
        e:(event)=>{
            return{
                to:(target)=>{
                    if (event.keyCode === 13){
                        return {
                            c:()=>{$(target).click();},
                            f:()=>{$(target).focus();},
                            s:()=>{$(target).submit();},
                        }
                    }
                },
                f:(do_er=()=>{})=>{
                    do_er(event.keyCode);
                }
            }
        },
        if:(compare_statement=false)=>{
            return{
                do:(handler_do=()=>{})=>{
                    if (compare_statement){
                        handler_do();
                    }
                    return {
                        e:(handler_e=()=>{})=>{
                            if (!compare_statement){
                                handler_e();
                            }
                        }
                    }
                }
            }
        },
        c:(case_statement)=>{
            return {
                _1:(case_1,handler_1=()=>{})=>{
                    if (case_statement === case_1){
                        handler_1();
                    }
                    return {
                        _2:(case_2, handler_2 = ()=>{})=>{
                            if (case_statement === case_2){
                                handler_2();
                            }
                        }
                    }
                }
            }
        },
        _s:(ele)=>{
            return {
                _b4:(handler_b4=()=>{})=>{
                    return {
                        end:(handler_end=()=>{}, timer=500)=>{
                            let w_tmer = setTimeout(function (){},1000);
                            $(ele).scroll(function (){
                                let scrolled = this.offsetHeight + (this.scrollTop);
                                if (scrolled+1 >= this.scrollHeight){
                                    clearTimeout(w_tmer);
                                    handler_b4();
                                    w_tmer = setTimeout(function (){
                                        handler_end();
                                    },timer);
                                }
                            });
                        }
                    }
                },

            }
        }
    }
}

const n = function (number=0){
    return {
        f:function (format="0,0"){
            return numeral(number).format(format);
        }
    }
}
const none = function (_params,_callback=()=>{}, _error=()=>{}){
    axios.get("../api/none", {
        params:_params
    }).then(function (_fx){
        _callback(_fx.data);
    }).catch(function (_gx){
        console.log(_gx.response);
    });
}
