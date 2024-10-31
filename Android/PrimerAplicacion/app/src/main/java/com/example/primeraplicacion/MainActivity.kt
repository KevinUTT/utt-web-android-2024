package com.example.primeraplicacion

import android.os.Bundle
import android.os.Handler
import android.os.Looper
import android.widget.EditText
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import java.io.BufferedReader
import java.io.DataOutputStream
import java.io.InputStreamReader
import java.net.HttpURLConnection
import java.net.URL
import java.util.concurrent.Executors


class MainActivity : AppCompatActivity() {
    private var _URL = "http://10.0.2.2:2024";
    lateinit var debug:TextView;
    lateinit var password:EditText;
    lateinit var username:EditText;
    
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        val login = findViewById<TextView>(R.id.login);
        password = findViewById<EditText>(R.id.password);
        username = findViewById<EditText>(R.id.username);
        debug = findViewById<TextView>(R.id.debug);

        login.setOnClickListener {
            val executor = Executors.newSingleThreadExecutor()
            val handler: Handler = Handler(Looper.getMainLooper())

            executor.execute {
                val data = "login=" + username.text.toString() +
                        "&password=" + password.text.toString()
                val postData: ByteArray = data.toByteArray(charset("UTF-8"))
                val postDataLength = postData.size
                val request = "$_URL/services/login.php"
                val url = URL(request)
                val conn = url.openConnection() as HttpURLConnection
                conn.doOutput = true
                conn.instanceFollowRedirects = false
                conn.requestMethod = "POST"
                conn.setRequestProperty("Content-Type", "application/x-www-form-urlencoded")
                conn.setRequestProperty("charset", "utf-8")
                conn.setRequestProperty("User-Agent","Mozilla/5.0 ( compatible ) ");
                conn.setRequestProperty("Accept","*/*");
                //conn.setRequestProperty("Content-Length", postDataLength.toString())
                conn.useCaches = false
                DataOutputStream(conn.outputStream).use { wr ->
                    wr.write(postData)
                    wr.flush();
                }

                var result: String = ""
                var br: BufferedReader? = null
                if (conn.responseCode == 200) {
                    br = BufferedReader(InputStreamReader(conn.inputStream))
                    var strCurrentLine: String?
                    while ((br.readLine().also { strCurrentLine = it }) != null) {
                        result = result + strCurrentLine
                    }
                } else {
                    br = BufferedReader(InputStreamReader(conn.errorStream))
                    var strCurrentLine: String?
                    while ((br.readLine().also { strCurrentLine = it }) != null) {
                        result = result + strCurrentLine
                    }
                }

                if(conn.responseCode !== 200) {
                    debug.text = "No se ha podido iniciar sesión";
                    return@execute;
                }

                debug.text = "Bienvenido"


                handler.post(Runnable {
                    //UI Thread work here
                })
            }
        }

        /*val botonGenerar = findViewById<Button>(R.id.generar);

        val edad = findViewById<EditText>(R.id.edad);
        edad.setOnKeyListener { v, key, e ->
            if(key == KeyEvent.KEYCODE_MINUS){
                return@setOnKeyListener true;
            }

            return@setOnKeyListener false;
        };

        botonGenerar.setOnClickListener {
            val nombre = findViewById<EditText>(R.id.nombre);
            val apellidos = findViewById<EditText>(R.id.apellidos);
            val edad = findViewById<EditText>(R.id.edad);

            val resultado = findViewById<TextView>(R.id.resultado);
            resultado.text =
                "Nombre: " + nombre.text.toString() + "\n" +
                "Apellidos: " + apellidos.text.toString() + "\n" +
                "Edad: " + edad.text.toString();
        }*/

        /*val botones = ArrayList<Button>();
        botones.add(findViewById<Button>(R.id.num7))
        botones.add(findViewById<Button>(R.id.num8))
        botones.add(findViewById<Button>(R.id.num9))
        botones.add(findViewById<Button>(R.id.num4))
        botones.add(findViewById<Button>(R.id.num5))
        botones.add(findViewById<Button>(R.id.num6))
        botones.add(findViewById<Button>(R.id.num3))
        botones.add(findViewById<Button>(R.id.num2))
        botones.add(findViewById<Button>(R.id.num1))
        botones.add(findViewById<Button>(R.id.num0))

        val pantalla = findViewById<TextView>(R.id.pantalla);
        botones.forEach {
            b -> b.setOnClickListener {
               pantalla.text = "" + pantalla.text + b.text;
            }
        }

        val suma = findViewById<TextView>(R.id.suma);
        val resta = findViewById<TextView>(R.id.resta);
        val multiplicacion = findViewById<TextView>(R.id.multiplicacion);
        val division = findViewById<TextView>(R.id.division);

        var numeroIzquierdo = 0;
        var numeroDerecho = 0;
        var operador = "+";

        suma.setOnClickListener {
            operador = "+";
            numeroIzquierdo = pantalla.text.toString().toInt();
            pantalla.text = "";
        }

        resta.setOnClickListener {
            operador = "-";
            numeroIzquierdo = pantalla.text.toString().toInt();
            pantalla.text = "";
        }

        multiplicacion.setOnClickListener {
            operador = "*";
            numeroIzquierdo = pantalla.text.toString().toInt();
            pantalla.text = "";
        }

        division.setOnClickListener {
            operador = "/";
            numeroIzquierdo = pantalla.text.toString().toInt();
            pantalla.text = "";
        }

        val igual = findViewById<TextView>(R.id.igual);
        igual.setOnClickListener {
            numeroDerecho = pantalla.text.toString().toInt();
            when(operador) {
                "+" -> {
                    pantalla.text = (numeroIzquierdo + numeroDerecho).toString();
                }

                "-" -> {
                    pantalla.text = (numeroIzquierdo - numeroDerecho).toString();
                }

                "*" -> {
                    pantalla.text = (numeroIzquierdo * numeroDerecho).toString();
                }

                "/" -> {
                    pantalla.text = (numeroIzquierdo / numeroDerecho).toString();
                }
            }
        }

        val borrar = findViewById<TextView>(R.id.borrar);
        borrar.setOnClickListener {
            numeroDerecho = 0;
            numeroIzquierdo = 0;
            operador = "+";
            pantalla.text = "";
        }*/


    }
}