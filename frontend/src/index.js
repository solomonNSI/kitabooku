import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import "./index.css";
import App from "./Views/AppView/App";
import Login from "./Views/LoginView/Login";
import SignUp from "./Views/SignUpView/SignUp";
import Feed from "./Views/FeedView/Feed";
import Lists from "./Views/ListsView/Lists";
import Leaderboard from "./Views/LeaderboardView/Leaderboard";
import BuyEbooks from "./Views/BuyEbooksView/BuyEbooks";
import Forums from "./Views/ForumsView/Forums";
import Settings from "./Views/SettingsView/Settings";
import Profile from "./Views/ProfileView/Profile";


export default function Root() {
  return (
    <BrowserRouter>
      <Routes>
        <Route index path="/" element={<App />} />
        <Route path="signup" element={<SignUp />} />
        <Route path="login" element={<Login />} />,
        <Route path="feed" element={<Feed />} />
        <Route path="lists" element={<Lists />} />
        <Route path="leaderboard" element={<Leaderboard />} />
        <Route path="buy-ebooks" element={<BuyEbooks />} />
        <Route path="forums" element={<Forums />} />
        <Route path="settings" element={<Settings />} />
        <Route path="feed" element={<Feed />} />,
        <Route path="profile" element={<Profile />} />
      </Routes>
    </BrowserRouter>
  );
}

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(<Root />);