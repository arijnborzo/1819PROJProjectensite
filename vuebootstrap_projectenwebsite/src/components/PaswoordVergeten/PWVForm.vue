<template>
    
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div>
                      <h3>Vraag hier een nieuw wachtwoord aan</h3>
                        <form @submit.prevent="handleSubmit">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" v-model="user.email" id="email" name="email" class="form-control" :class="{ 'is-invalid': submitted && $v.user.email.$error }" />
                                <div v-if="submitted && $v.user.email.$error" class="invalid-feedback">
                                    <span v-if="!$v.user.email.required">E-mail is vereist</span>
                                    <span v-if="!$v.user.email.email">E-mail ongeldig</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Niew wachtwoord</label>
                                <input type="password" v-model="user.password" id="password" name="password" class="form-control" :class="{ 'is-invalid': submitted && $v.user.password.$error }" />
                                <div v-if="submitted && $v.user.password.$error" class="invalid-feedback">
                                    <span v-if="!$v.user.password.required"> Wachtwoord is vereist</span>
                                    <span v-if="!$v.user.password.minLength">Wachtwoord moet minstens 6 karakters lang zijn.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Bevestig wachtwoord</label>
                                <input type="password" v-model="user.confirmPassword" id="confirmPassword" name="confirmPassword" class="form-control" :class="{ 'is-invalid': submitted && $v.user.confirmPassword.$error }" />
                                <div v-if="submitted && $v.user.confirmPassword.$error" class="invalid-feedback">
                                    <span v-if="!$v.user.confirmPassword.required">Bevestig Wachtwoord is vereist</span>
                                    <span v-else-if="!$v.user.confirmPassword.sameAsPassword">Wachtwoorden moeten overeenkomen</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Registreer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    import { required, email, minLength, sameAs } from "vuelidate/lib/validators";

    export default {
        name: "app",
        data() {
            return {
                user: {
                    email: "",
                    password: "",
                    confirmPassword: ""
                },
                submitted: false
            };
        },
        validations: {
            user: {
                email: { required, email },
                password: { required, minLength: minLength(6) },
                confirmPassword: { required, sameAsPassword: sameAs('password') }
            }
        },
        methods: {
            handleSubmit(e) {
                this.submitted = true;

                // stop here if form is invalid
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return;
                }

                alert("SUCCESS!!\n\n" + JSON.stringify(this.user));
                this.$router.push({ path: "login" });

            }
        }
    };
</script>
