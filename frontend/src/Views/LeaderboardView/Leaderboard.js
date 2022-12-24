import * as S from "../FeedView/style";
import { useNavigate } from "react-router-dom";
import SideBar from "../../Components/SideBar";



const Leaderboard = () => {
  const navigate = useNavigate();
  return (
   
    <div
      style={{
        backgroundColor: "#eeeeee",
        height: "auto",
        display: "flex",
        justifyContent: "center",
      }}
    > 
    
    
      <SideBar active={true}/>
      <S.Background>
        
      </S.Background>
    </div>
  );
};

export default Leaderboard;