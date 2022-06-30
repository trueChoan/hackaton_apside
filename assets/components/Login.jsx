import React from "react"
import "../styles/login.css"
import { useForm } from 'react-hook-form';
import { Link } from 'react-router-dom';

import Triangle from "../src/image/triangle.png";

function formlogin() {

    const { register, handleSubmit, formState: { errors } } = useForm();
    const onSubmit = data => console.warn(data);
    console.warn(errors);


    return (
      
      <div className="formlogin">
      <div className="triforce">
      <img className="triangle" src={Triangle} alt={Triangle}></img>
      </div>
      <div className="pas">
      <h1 className="formtitle">Log in with your confidentials ID</h1>
      <form onSubmit={handleSubmit(onSubmit)}>
      <p className="email">Your email</p><br></br>
      <input className="enterinfo" type="email" placeholder="Write your email here" {...register("Email", {required: true, pattern: /^\S+@\S+$/i})} />
      <p className="password">Your password</p><br></br>
      <input className="enterinfo2" type="password" placeholder="And the password here" {...register("Password", {required: true, pattern: /^\S+@\S+$/i})} />
      <Link to="/app">
      <button className="buttonsubmit" type="submit"><p className="connected">Connexion</p></button>
      </Link>
      <button className="buttonforgot"><p className="forgot">Forgot your password ?</p></button>
    </form>
      </div>
      </div>
    )
  }
  
  export default formlogin;