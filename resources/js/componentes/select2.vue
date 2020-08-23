<template>
    <select :value="value" v-on:input="updateValue($event.target.value)" :multiple="multiple" :data-placeholder="placeholder" :class="class1 || {}" :ajax="ajax">
        <option v-for="(option,index) in getOptions" :value="option.id" :key="index" v-html="option.nombre"></option>
    </select>
</template>

<script>
import jquery from 'jquery';

export default {
    props: {
        value: {required: true, default: ''},
        options: {type: Array, required: false},
        config: {type: Object, required: true},
        placeholder: {type: String, default: 'Seleccione'},
        class1: {type: Object, default: function(){ return {} } },
        debug: {type: Boolean, default: false},
        multiple:{type:Boolean, default:false},
        ajax:{type:Boolean, default:false},
        select2Id:{type:String, default:''}
    },
    data(){
        return {
            itemsByAjax:[]
        }
    },
    mounted() {
        var vm = this
        $(this.$el).val(this.value).on('change', function () {
            if(this.debug) console.log('select2:change', this.value);
            vm.updateValue(this.value); // this == this.$el
        });

        this.$watch('config', this.reloadSelect2, {
            deep: true,
            immediate: true
        });

        //ajax based selec2
        if(this.ajax == true){

            this.initAjax();

            //Inicializar evento
            this.$parent.$on('updateSelect2Options', function (url) {
                vm.updateOptions(url);
            })
            return false;
        }
        //normal select2
        this.init();
    },
    beforeDestroyed(){
        this.destroy().init();
    },
    destroyed(){
        $(this.$el).select2('destroy');
    },
    computed:{
        getOptions(){
            return this.options;
        },
        getItemsByAjax(){
            return this.itemsByAjax;
        },
        getUrl(){
            if(this.config.hasOwnProperty('url')){
                return this.config.url;
            }
        }
    },
    methods: {
        init() {
            if(this.debug) console.log('select2:init');
            let scope = this;
            $(this.$el).select2(this.config);
            this.$nextTick(function(){
                this.$el.value = this.value;
                $(this.$el).trigger('change');
            });
            return this;
        },
        getAjaxParams(eparams) {
            let context = this;

            return {
                width:'100%',
                ajax: {
                    url: context.getUrl,
                    method:'POST',
                    dataType: 'json',
                    delay: 200,
                    cache: true,
                    data: function (params) {

                        var params = {
                            q: params.term, // search term
                            page: params.page,
                            limit: 10,
                            erptkn: window.tkn
                        };

                        //verificar si existe variable para agregar parametros adicionales
                        if(typeof eparams != 'undefined' && eparams != ''){
                            params = $.extend(params, eparams);
                        }
                        if(typeof window.eparams != 'undefined' && window.eparams != ''){
                            params = $.extend(params, window.eparams);
                        }

                        return params;
                    },
                    processResults: function (data, params) {
                        self.data=data;
                        FlexioEvent.$emit('onCatalogoEmpezable',data);
                        if(context.config.using==null){
                            console.log("ERROR: using is missing in select2 config");
                        }
                        let resultsReturn = data.map(resp=> [{
                            'id': resp[context.config.using[0]],
                            'text': resp[context.config.using[1]]
                        }]).reduce((a, b) => a.concat(b),[]);
                        context.itemsByAjax = data;
                        return {results:resultsReturn};
                    },
                    escapeMarkup: function (markup) { return markup; },
                }
            };
        },
        initAjax() {
            if(this.debug) console.log('select2 ajax:init');
            let scope = this;
            $(this.$el).select2(this.getAjaxParams());

            this.$nextTick(function(){
                this.$el.value = this.value;
                $(this.$el).trigger('change');
            });
            return this;
        },
        destroy() {
            if(this.debug) console.log('select2:destroy');
            $(this.$el).select2('destroy');
            return this;
        },
        updateValue(value) {
            if(this.$el.hasAttribute('multiple')){
                let valores = new Array();
                valores = $(this.$el).select2('data');
                this.$emit('input', value);
            }else{
                this.$emit('input', value);
            }

        },
        updateOptions: function (data) {
            var url = _.isObject({data}) ? data.url : this.getUrl();
            var params = _.isObject({data}) ? data.params : '';
            let options = this.getAjaxParams(params);
            options.ajax.url = url;
            $(this.$el).select2(options);
        },
        reloadSelect2: function (config) {
            if(typeof config.url == 'undefined')return;
            this.initAjax();
        }
    },
    watch: {
        value(val) {
            this.$nextTick(function(){
                if(this.debug) console.log('select2:updated', this.value);
                $(this.$el).val(val);
                $(this.$el).trigger('change');
            });
        },
        options() {
            var self = this;
            this.$nextTick(function(){
                if(this.debug) console.log('select:rebuild', this.options.length);
                self.destroy().init();
            });
        },
    }
}
</script>
