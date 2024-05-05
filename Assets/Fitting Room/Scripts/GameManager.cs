using UnityEngine;

namespace Fitting_Room
{
    public class GameManager : MonoBehaviour
    {
        [SerializeField] private Player player;

        private static GameManager _instance;
        public static GameManager Instance => _instance;

        public Player Player => player;

        private void Awake()
        {
            _instance = this;
        }
    }
}


