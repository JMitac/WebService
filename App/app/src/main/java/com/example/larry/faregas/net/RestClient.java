package com.example.larry.faregas.net;

import com.example.larry.faregas.net.request.LoginRequest;
import com.example.larry.faregas.net.request.NewClientRequest;
import com.example.larry.faregas.net.response.ClientAllResponse;
import com.example.larry.faregas.net.response.RevisionResponse;
import com.example.larry.faregas.net.response.SimpleResponse;
import com.squareup.okhttp.Interceptor;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Response;

import java.io.IOException;

import retrofit.Call;
import retrofit.GsonConverterFactory;
import retrofit.Retrofit;
import retrofit.http.Body;
import retrofit.http.GET;
import retrofit.http.Header;
import retrofit.http.Headers;
import retrofit.http.POST;
import retrofit.http.Path;

/**
 * Created by BillyCaballero on 11/12/15.
 */
public class RestClient {

    private static FaregasApiInterface faregasApiInterface ;
    private static String baseUrl = "http://192.168.1.35:8000" ;

    public static FaregasApiInterface getClient() {
        if (faregasApiInterface == null) {

            OkHttpClient okClient = new OkHttpClient();


            okClient.interceptors().add(new Interceptor() {
                @Override
                public Response intercept(Chain chain) throws IOException {
                    Response response = chain.proceed(chain.request());
                    return response;
                }
            });

            Retrofit client = new Retrofit.Builder()
                    .baseUrl(baseUrl)
                    .client(okClient)
                    .addConverterFactory(GsonConverterFactory.create())
                    .build();
            faregasApiInterface = client.create(FaregasApiInterface.class);
        }
        return faregasApiInterface ;
    }

    public interface FaregasApiInterface {

        @Headers("Content-Type: application/json")
        @POST("/login")
        Call<SimpleResponse> loginUser(@Body LoginRequest loginRequest);

        @Headers("Content-Type: application/json")
        @GET("/client/all")
        Call<ClientAllResponse> getClients();

        @Headers("Content-Type: application/json")
        @POST("/client/new")
        Call<SimpleResponse> createClient(@Body NewClientRequest clientRequest);

        @Headers("Content-Type: application/json")
        @GET("/client/{code}/revision")
        Call<RevisionResponse> getRevision(@Path("code") String code);
    }

}