// public/js/supabaseClient.js
import { createClient } from "https://esm.sh/@supabase/supabase-js@2";

// ⚙️ Environment Variables — replace with your real values
// You can inject them from PHP/Twig later if needed.
const SUPABASE_URL = "https://your-project-id.supabase.co";
const SUPABASE_ANON_KEY = "your-anon-key";

// Create Supabase client
export const supabase = createClient(SUPABASE_URL, SUPABASE_ANON_KEY);

// ✅ Ensure session persistence across refreshes
supabase.auth.onAuthStateChange((event, session) => {
  if (session) {
    localStorage.setItem("sb-session", JSON.stringify(session));
  } else {
    localStorage.removeItem("sb-session");
  }
});

// ✅ Load session from storage on reload
const savedSession = localStorage.getItem("sb-session");
if (savedSession) {
  const { access_token, refresh_token } = JSON.parse(savedSession);
  supabase.auth.setSession({
    access_token,
    refresh_token,
  });
}
