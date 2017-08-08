<template>
    <div class="form-group">
        <label class="col-md-3 control-label">{{ label }}</label>

        <div class="col-md-7">
            <slot></slot>
            <span class="help-block">
                {{ info }}
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['label','info'],
    }
</script>