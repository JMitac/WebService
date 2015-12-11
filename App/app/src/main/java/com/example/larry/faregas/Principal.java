package com.example.larry.faregas;


import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;


public class Principal extends AppCompatActivity{

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_principal);

        Button btnRegister = (Button)findViewById(R.id.btnregister);
        Button btnLogin = (Button) findViewById(R.id.btnLogin);
        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String usuario = ((EditText) findViewById(R.id.txtusuario)).getText().toString();
                String password = ((EditText) findViewById(R.id.txtpassword)).getText().toString();
                if(usuario.equals("admin") && password.equals("12345")){

                    Intent newForm = new Intent(Principal.this,Display.class);
                    startActivity(newForm);
                }
                else{
                    Toast.makeText(getApplicationContext(),"Usuario incorrecto",Toast.LENGTH_SHORT).show();
                }
            }
        });

       btnRegister.setOnClickListener(new View.OnClickListener() {
           @Override
           public void onClick(View view){
                Intent newFormulario = new Intent(Principal.this,RegisterActivity.class);
                startActivity(newFormulario);
           }
       });




    }


}
