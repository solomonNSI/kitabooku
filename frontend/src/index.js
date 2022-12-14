import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import "./index.css";
import App from "./Views/AppView/App";
import Login from "./Views/LoginView/Login";
import SignUp from "./Views/SignUpView/SignUp";
import Feed from "./Views/FeedView/Feed";
import Profile from "./Views/ProfileView/Profile";

export default function Root() {
  return (
    <BrowserRouter>
      <Routes>
        <Route index path="/" element={<App />} />
        <Route path="signup" element={<SignUp />} />
        <Route path="login" element={<Login />} />,
        <Route path="feed" element={<Feed />} />,
        <Route path="profile" element={<Profile />} />
      </Routes>
    </BrowserRouter>
  );
}

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(<Root />);