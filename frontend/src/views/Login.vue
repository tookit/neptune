<template>
  <div class="main">
    <a-form
      class="user-layout-login"
      ref="formLogin"
      :autoFormCreate="(form)=>{this.form = form}"
      id="formLogin"
    >
      <a-form-item
        fieldDecoratorId="username"
        :fieldDecoratorOptions="{rules: [{ required: true, message: '请输入帐户名或邮箱地址' }], validateTrigger: 'change'}"
      >
        <a-input size="large" type="text" placeholder="帐户名或邮箱地址 / admin" >
          <a-icon slot="prefix" type="user" :style="{ color: 'rgba(0,0,0,.25)' }"/>
        </a-input>
      </a-form-item>

      <a-form-item
        fieldDecoratorId="password"
        :fieldDecoratorOptions="{rules: [{ required: true, message: '请输入密码' }], validateTrigger: 'blur'}"
      >
        <a-input size="large" type="password" autocomplete="false" placeholder="密码 / admin">
          <a-icon slot="prefix" type="lock" :style="{ color: 'rgba(0,0,0,.25)' }"/>
        </a-input>
      </a-form-item>
      <a-form-item>
        <a-checkbox >自动登陆</a-checkbox>
        <router-link
          :to="{ name: 'recover', params: { user: 'aaa'} }"
          class="forge-password"
          style="float: right;"
        >忘记密码</router-link>
      </a-form-item>

      <a-form-item style="margin-top:24px">
        <a-button
          size="large"
          type="primary"
          htmlType="submit"
          class="login-button"
          :loading="loginBtn"
          @click.stop.prevent="handleSubmit"
          :disabled="loginBtn"
        >确定</a-button>
      </a-form-item>

      <div class="user-login-other">
        <span>其他登陆方式</span>
        <a>
          <a-icon class="item-icon" type="alipay-circle"></a-icon>
        </a>
        <a>
          <a-icon class="item-icon" type="taobao-circle"></a-icon>
        </a>
        <a>
          <a-icon class="item-icon" type="weibo-circle"></a-icon>
        </a>
        <router-link class="register" :to="{ name: 'register' }">注册账户</router-link>
      </div>
    </a-form>

  </div>
</template>

<script>
import md5 from 'md5'
import api from '@/api'
import { mapActions } from 'vuex'
import { timeFix } from '@/utils/util'

export default {
  components: {
  },
  data() {
    return {
      loginBtn: false,
      login: {
        username: 'michaelwang',
        password: 'secret'
      },
      formItems: [
        
        {
          fieldDecoratorId: 'username',
          fieldDecoratorOptions: {
            rules: [
              { required: true, message: 'Username Required' }
            ],
            validateTrigger: 'change'
          }
        },
        
        {
          fieldDecoratorId: 'password',
          fieldDecoratorOptions: {
            rules: [
              { required: true, message: 'Password required' }
            ],
            validateTrigger: 'blur'
          }
        },
        

      ],

    }
  },
  created() {

  },
  methods: {
    ...mapActions(['Login', 'Logout']),
    // handler
    handleSubmit() {

      this.form.validateFields(['username', 'password'], { force: true }, (err, values) => {
        console.log(values)
      })
    }


  }
}
</script>

<style lang="scss" scoped>
.user-layout-login {
  label {
    font-size: 14px;
  }

  .getCaptcha {
    display: block;
    width: 100%;
    height: 40px;
  }

  .forge-password {
    font-size: 14px;
  }

  button.login-button {
    padding: 0 15px;
    font-size: 16px;
    height: 40px;
    width: 100%;
  }

  .user-login-other {
    text-align: left;
    margin-top: 24px;
    line-height: 22px;

    .item-icon {
      font-size: 24px;
      color: rgba(0, 0, 0, 0.2);
      margin-left: 16px;
      vertical-align: middle;
      cursor: pointer;
      transition: color 0.3s;

      &:hover {
        color: #1890ff;
      }
    }

    .register {
      float: right;
    }
  }
}
</style>