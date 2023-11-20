import roles from "../../../constants/roles";
import authenticate from "../../../authentication";

const {
  MANAGER,
}  = roles();

const CURRENT_ROLE = MANAGER;
authenticate(CURRENT_ROLE);
